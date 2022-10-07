<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Notification;
use App\Models\Question;
use App\Models\Subscription;
use App\Models\UserQuestionAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sub = Subscription::latest()->where('user_id', Auth::user()->id)->first(); 
        
        $subscription = Subscription::latest()->where('user_id', Auth::user()->id)
                                             ->where('status', 'Active')->first();
        $deposits = Deposit::latest()->where('user_id', Auth::user()->id)->get();

        return view('dashboard.dashboard', [
            'sub' => $sub,
            'subscription' => $subscription,
            'deposits' => $deposits
        ]);
    }

    public function add_subscription()
    {
        $user = User::findorfail(Auth::user()->id);

        $SECRET_KEY = config('app.paystack_secret_key');

        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $user->email,
            'amount' => 1825 * 100,
            'callback_url' => route('user.new.handleGatewayCallback'),
            'metadata' => [
                'user_id' => $user->id,
            ]
        ];

        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $SECRET_KEY",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $paystack_result = curl_exec($ch);

        $result = json_decode($paystack_result);

        // dd($result);
        $authorization_url = $result->data->authorization_url;
        $paystack_status = $result->status;

        // return dd($result->status);

        if ($paystack_status == true) {
            return redirect()->to($authorization_url);
        } else {
            return back()->with([
                'type' => 'danger',
                'message' => 'Payment failed. Response not ok'
            ]); 
        }
    }

    public function handleGatewayCallback()
    {
        $SECRET_KEY = config('app.paystack_secret_key');
        
        $curl = curl_init();

        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
            if(!$reference){
            die('No reference supplied');
        }
  
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $SECRET_KEY",
                "Cache-Control: no-cache",
            ),
        ));
        
        $paystack_response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
            
        $result = json_decode($paystack_response);
        
        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        } else {
            // dd($result);
            $user = User::findorfail($result->data->metadata->user_id);
            $date = now()->addYear();

            $user->update([
                'amount' => $user->amount + ($result->data->amount / 100),
                'subscription_status' => 'Active'
            ]);
            
            Subscription::create([
                'user_id' => $result->data->metadata->user_id, 
                'amount'  => ($result->data->amount / 100), 
                'start_date' => now(), 
                'expiry_date' => $date->format('Y-m-d'),
            ]);

            Deposit::create([
                'user_id' => $result->data->metadata->user_id,
                'amount' => ($result->data->amount / 100),
                'transaction_id' => $result->data->id,
                'ref_id' => $result->data->reference,
                'paid_at' => $result->data->paid_at,
                'channel' => $result->data->channel,
                'ip_address' => $result->data->ip_address,
                'status' => $result->data->status,
            ]);

            return redirect()->route('home')->with([
                'type' => 'danger',
                'message' => 'Subscription Successful!'
            ]); 
        }
    }

    public function subscriptions()
    {
        $subscriptions = Subscription::latest()->where('user_id', Auth::user()->id)->get();
       
        return view('dashboard.subscriptions', [
            'subscriptions' => $subscriptions,
        ]);
    }

    public function deposits()
    {
        $deposits = Deposit::latest()->where('user_id', Auth::user()->id)->get();

        return view('dashboard.deposits', [
            'deposits' => $deposits
        ]);
    }

    public function account()
    {
        return view('dashboard.account');
    }

    public function upload_photo($id, Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'photo' => 'required|mimes:jpeg,png,jpg',
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        //Validate User
        if (request()->hasFile('photo')) {
            $filename = request()->photo->getClientOriginalName();
            if($profile->photo) {
                Storage::delete(str_replace("storage", "public", $profile->photo));
            }
            request()->photo->storeAs('users_avatar', $filename, 'public');
            $profile->photo = '/storage/users_avatar/'.$filename;
            $profile->save();
            
            return back()->with([
                'type' => 'success',
                'message' => 'Photo Updated Successfully!'
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'message' => 'Access denied!',
            ]);
        }
    }

    public function update_password ($id, Request $request) 
    {
        $this->validate($request, [
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $userFinder = Crypt::decrypt($id);

        $user = User::findorfail($userFinder);
        
        $user->password = Hash::make($request->new_password);

        $user->save();

        return back()->with([
            'type' => 'success',
            'message' => 'Password Updated Successfully!'
        ]); 
    }

    public function notifications()
    {
        $notifications = Notification::latest()->where('to', Auth::user()->id)->get();

        return view('dashboard.notifications', [
            'notifications' => $notifications
        ]);
    }

    public function read_notification($id) 
    { 
        $notification_id = Crypt::decrypt($id);

        $notification = Notification::findorfail($notification_id);
        
        $notification->status = 'Read';
        $notification->save();

        return back();
    }

    public function knowledgebase()
    {
        $questions = Question::latest()->get();
        // $quests = Question::join('user_question_answers', 'questions.id', '=', 'user_question_answers.question_id')
        //                 ->get(['questions.*', 'user_question_answers.*']);

        // $questions = Question::latest()->where('id', $quests->question_id)->count()->first();
        // dd($quests);

        return view('dashboard.knowledgebase', [
            'questions' => $questions
        ]);
    }

    public function post_knowledgebase_answer($id, Request $request)
    {
        $question_id = Crypt::decrypt($id);

        $question = Question::findorfail($question_id);
        
        $radio = 'answer_'.$question_id;
        $answer = $request->$radio;

        $userAnswers = UserQuestionAnswer::where('user_id', Auth::user()->id)->get();

        if($userAnswers->isEmpty())
        {
            if($question->correct_answer == $answer)
            {
                UserQuestionAnswer::create([
                    'user_id' => Auth::user()->id,
                    'question_id' => $question->id,
                    'answer' => $answer,
                    'result' => 'Success'
                ]); 
            } else {
                UserQuestionAnswer::create([
                    'user_id' => Auth::user()->id,
                    'question_id' => $question->id,
                    'answer' => $answer,
                    'result' => 'Failed'
                ]);
            }
        } else {
            foreach ($userAnswers as $userAnswer) {
                $userQuestion[] = $userAnswer->question_id;
                $userID[] = $userAnswer->user_id;
            }
            if (in_array($question->id, $userQuestion) AND in_array(Auth::user()->id, $userID) ) {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Question has been ansered'
                ]);
            } else {
                if($question->correct_answer == $answer)
                {
                    UserQuestionAnswer::create([
                        'user_id' => Auth::user()->id,
                        'question_id' => $question->id,
                        'answer' => $answer,
                        'result' => 'Success'
                    ]); 
                } else {
                    UserQuestionAnswer::create([
                        'user_id' => Auth::user()->id,
                        'question_id' => $question->id,
                        'answer' => $answer,
                        'result' => 'Failed'
                    ]);
                }
            }
        }

        return back()->with([
            'type' => 'success',
            'message' => 'Answer Submitted!'
        ]); 
    }
}