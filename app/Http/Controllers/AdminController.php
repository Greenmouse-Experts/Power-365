<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Blog;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;
use App\Models\Question;
use App\Models\Topic;
use App\Models\Topics;
use App\Models\UserQuestionAnswer;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        $totalactiveusers = User::latest()->where('subscription_status', 'Active')
                                        ->where('user_type', 'Client')->get();
        $totalinactiveusers = User::latest()->where('subscription_status', 'Inactive')
                                        ->where('user_type', 'Client')->get();
        $latestusers = User::latest()->take(5)->where('user_type', 'Client')->get();
        $deposits = Deposit::latest()->sum('amount');
        $latestdeposits = User::join('deposits', 'users.id', '=', 'deposits.user_id')->take(5)->get(['users.*', 'deposits.*']);

        $statisticstotalusers = User::where('user_type', 'Client')->count();
        $statisticstotalactiveusers = User::where('subscription_status', 'Active')
                                        ->where('user_type', 'Client')->count();
        $statisticstotalinactiveusers = User::where('subscription_status', 'Inactive')
                                        ->where('user_type', 'Client')->count();

        // dd($statisticstotalusers);
        return view('admin.dashboard', [
            'totalactiveusers' => $totalactiveusers,
            'totalinactiveusers' => $totalinactiveusers,
            'latestusers' => $latestusers,
            'deposits' => $deposits,
            'latestdeposits' => $latestdeposits,
            'statisticstotalusers' => $statisticstotalusers,
            'statisticstotalactiveusers' => $statisticstotalactiveusers,
            'statisticstotalinactiveusers' => $statisticstotalinactiveusers
        ]);
    }

    public function active_users()
    {
        $active_users = User::latest()->where('subscription_status', 'Active')
                                ->where('user_type', 'Client')->get();

        return view('admin.active_users', [
            'active_users' => $active_users
        ]);
    }

    public function view_edit_user($id, Request $request)
    {
        $userFinder = Crypt::decrypt($id);

        $user = User::findorfail($userFinder);

        return view('admin.view_edit_user', [
            'user' => $user
        ]);
    }

    public function delete_user($id)
    {
        $finder = Crypt::decrypt($id);

        $user = User::find($finder);

        Storage::delete(str_replace("storage", "public", $user->photo));

        $user->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'User Deleted!'
        ]); 
    }

    public function users_knowledgebase($id)
    {
        $userFinder = Crypt::decrypt($id);

        $user = User::findorfail($userFinder);

        $users_knowledgebase = UserQuestionAnswer::join('questions', 'user_question_answers.question_id', '=', 'questions.id')
                                ->join('users', 'user_question_answers.user_id', '=', 'users.id')
                                ->where('user_question_answers.user_id',  $user->id)->get(['user_question_answers.*', 'questions.*', 'users.first_name', 'users.last_name']);

        return view('admin.users_knowledgebase', [
            'users_knowledgebase' => $users_knowledgebase
        ]);
    }

    public function in_active_users()
    {
        $inactive_users = User::latest()->where('subscription_status', 'Inactive')
                                ->where('user_type', 'Client')->get();

        return view('admin.in_active_users', [
            'inactive_users' => $inactive_users
        ]);
    }

    public function unsuccessful_users()
    {
        $unsuccessful_users = User::latest()->where('subscription_status', null)
                                ->where('user_type', 'Client')->get();

        return view('admin.unsuccessful_users', [
            'unsuccessful_users' => $unsuccessful_users
        ]);
    }

    public function deposits()
    {
        $deposits = User::join('deposits', 'users.id', '=', 'deposits.user_id')
               ->get(['users.*', 'deposits.*']);

        return view('admin.deposits', [
            'deposits' => $deposits
        ]);
    }

    public function account()
    {
        return view('admin.account');
    }

    public function update_profile($id, Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone_number' => ['required', 'numeric'],
        ]);

        $userFinder = Crypt::decrypt($id);

        $user = User::findorfail($userFinder);

        if($user->email == $request->email)
        {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Profile Updated Successfully!'
            ]); 

        } else {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Profile Updated Successfully!'
            ]);
        }
    }

    public function upload_photo($id, Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'photo' => 'required|mimes:jpeg,png,jpg|max:1024',
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

    public function message_user($user_id, Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'subject' => ['required','string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $id = Crypt::decrypt($user_id);

        $user = User::findorfail($id);

        $message = new Notification();
        $message->from = 'Admin';
        $message->to = $user->id;
        $message->subject = request()->subject;
        $message->message = request()->message;
        $message->save();

        /** Store information to include in mail in $data as an array */
        $data = array(
            'name' => $user->first_name .' '. $user->last_name,
            'email' => $user->email
        );
        
        /** Send message to the user */
        Mail::send('emails.notification', $data, function ($m) use ($data) {
            $m->to($data['email'])->subject(config('app.name'));
        });

        return back()->with([
            'type' => 'success',
            'icon' => 'mdi-check-all',
            'message' => 'Message sent successfully to '.$user->first_name.' '.$user->last_name,
        ]); 
    }

    public function notifications()
    {
        $notifications = User::join('notifications', 'users.id', '=', 'notifications.to')
               ->get(['users.*', 'notifications.*']);

        return view('admin.notifications', [
            'notifications' => $notifications
        ]);
    }

    public function topics()
    {
        $topics = Topic::latest()->get();

        return view('admin.topics', [
            'topics' => $topics
        ]);
    }

    public function create_topic(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255']
        ]);

        Topic::create([
            'name' => $request->name,
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Topic Added Successfully!'
        ]); 
    }

    public function update_topic($id, Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255']
        ]);
        
        $finder = Crypt::decrypt($id);

        $topic = Topic::find($finder);

        $topic->update([
            'name' => $request->name
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Topic Updated!'
        ]); 
    }

    public function delete_topic($id, Request $request)
    {
        $finder = Crypt::decrypt($id);

        Topic::find($finder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Topic Deleted!'
        ]); 
    }

    public function questions()
    {
        $topics = Topic::latest()->get();

        return view('admin.questions', [
            'topics' => $topics
        ]);
    }

    public function create_question(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'topic' => ['required', 'string', 'max:255'],
            'question' => ['required', 'string', 'max:255'],
            'correct_answer' => ['required', 'string', 'max:255'],
            'option_two' => ['required', 'string', 'max:255'],
            'option_three' => ['required', 'string', 'max:255'],
            'option_four' => ['required', 'string', 'max:255']
        ]);

        Question::create([
            'topic_id' => $request->topic,
            'question' => $request->question,
            'correct_answer' => $request->correct_answer,
            'option2' => $request->option_two,
            'option3' => $request->option_three,
            'option4' => $request->option_four
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Question Added Successfully!'
        ]); 
    }

    public function view_questions()
    {
        $questions = Question::join('topics', 'topics.id', '=', 'questions.topic_id')
               ->get(['topics.*', 'questions.*']);

        $topics = Topic::latest()->get();

        return view('admin.view_questions', [
            'questions' => $questions,
            'topics' => $topics
        ]);
    }

    public function update_question($id, Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'topic' => ['required', 'string', 'max:255'],
            'question' => ['required', 'string', 'max:255'],
            'correct_answer' => ['required', 'string', 'max:255'],
            'option_two' => ['required', 'string', 'max:255'],
            'option_three' => ['required', 'string', 'max:255'],
            'option_four' => ['required', 'string', 'max:255']
        ]);

        $finder = Crypt::decrypt($id);

        $question = Question::find($finder);

        $question->update([
            'topic_id' => $request->topic,
            'question' => $request->question,
            'correct_answer' => $request->correct_answer,
            'option2' => $request->option_two,
            'option3' => $request->option_three,
            'option4' => $request->option_four
        ]);
        
        return back()->with([
            'type' => 'success',
            'message' => 'Question Updated!'
        ]); 
    }

    public function delete_question($id, Request $request)
    {
        $finder = Crypt::decrypt($id);

        Question::find($finder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Question Deleted!'
        ]); 
    }

    public function beneficiaries()
    {
        // $beneficiaries = Beneficiary::latest()->get();
        $beneficiaries = Beneficiary::join('users', 'beneficiaries.user_id', '=', 'users.id')
               ->get(['users.*', 'beneficiaries.*']);

        return view('admin.beneficiaries', [
            'beneficiaries' => $beneficiaries
        ]);
    }

    public function delete_beneficiaries($id)
    {
        $finder = Crypt::decrypt($id);

        Beneficiary::find($finder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Beneficiaries Deleted!'
        ]); 
    }

    public function shuffle()
    {
        $users = User::where('user_type', 'Client')->get();

        if($users->isEmpty())
        {
            return back()->with([
                'type' => 'danger',
                'message' => 'No Subscriber on the list.'
            ]);
        }

        $shuffle = $users->random(1)->first();

        $beneficiaries = Beneficiary::get();

        if($beneficiaries->isEmpty())
        {
            Beneficiary::create([
                'user_id' => $shuffle->id
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Beneficiary Selected Successfully!'
            ]);  
        } else {
            foreach ($beneficiaries as $beneficiary) {
                $createAt[] = $beneficiary->created_at->toDateString();
            }
            if (in_array(now()->toDateString(), $createAt)) {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Shuffle completed today, continue tomorrow!'
                ]);
            } else {
                foreach ($beneficiaries as $beneficiary) {
                    $userID[] = $beneficiary->user_id;
                }
                if (in_array($shuffle->id, $userID)) {
                    return back()->with([
                        'type' => 'danger',
                        'message' => 'Please try again!'
                    ]);
                } else {
                    Beneficiary::create([
                        'user_id' => $shuffle->id
                    ]);

                    return back()->with([
                        'type' => 'success',
                        'message' => 'Beneficiary Selected Successfully!'
                    ]); 
                }
            }
        }
    }

    public function add_blog()
    {
        return view('admin.add_blog');
    } 

    public function post_blog(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => 'required|mimes:jpeg,png,jpg|max:1024',
        ]);

        $image = request()->image->getClientOriginalName();
        request()->image->storeAs('blogs', $image, 'public');

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => '/storage/blogs/'.$image,
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Blog Published Successfully!'
        ]); 
    }

    public function view_blogs()
    {
        $blogs = Blog::latest()->get();

        return view('admin.view_blogs',[
            'blogs' => $blogs
        ]);
    }

    public function update_blog($id, Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        
        $finder = Crypt::decrypt($id);

        $blog = Blog::find($finder);

        if (request()->hasFile('image')) {

            //Validate Request
            $this->validate($request, [
                'image' => 'required|mimes:jpeg,png,jpg|max:1024',
            ]);

            $image = request()->image->getClientOriginalName();
            if($blog->image) {
                Storage::delete(str_replace("storage", "public", $blog->image));
            }
            request()->image->storeAs('blogs', $image, 'public');

            $blog->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => '/storage/blogs/'.$image,
            ]);

        } 

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Blog Updated!'
        ]); 
    }

    public function delete_blog($id, Request $request)
    {
        $finder = Crypt::decrypt($id);

        $blog = Blog::find($finder);

        Storage::delete(str_replace("storage", "public", $blog->image));

        $blog->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Blog Deleted!'
        ]); 
    }
}
