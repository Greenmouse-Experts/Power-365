<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\SendCodeResetPassword;
use App\Models\ResetCodePassword;
use App\Notifications\SendVerificationCode;
use App\Models\Deposit;
use App\Models\Subscription;
use Exception;
use Monarobase\CountryList\CountryListFacade;

class HomePageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function beneficiaries()
    {
        return view('beneficiaries');
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactConfirm(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'phone' => 'required|numeric',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        /** Store information to include in mail in $data as an array */
        $data = array(
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'subject' => request()->subject,
            'description' => request()->message,
            'created_at' => now(),
            'admin' => 'info@power365es.com',
        );
        /** Send message to the admin */
        Mail::send('emails.contact', $data, function ($m) use ($data) {
            $m->to($data['admin'])->subject('Contact Form Notification');
        });

        return back()->with('success_report', 'Thanks for contacting us, We will get in touch with you shortly!');
    }

    public function blog()
    {
        return view('blog');
    }

    public function terms_conditions()
    {
        return view('terms_conditions');
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }

    public function subscribe()
    {
        return view('subscribe');
    }

    public function post_subscribe(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
            'phone_number' => ['required', 'numeric', 'digits:11'],
            'i_agree' => ['required', 'string', 'max:255']
        ]);

        try {
            $sid = config('app.twilio.sid'); 
            $token = config('app.twilio.auth_token');
            $twilio = new Client($sid, $token);

            $twilio->lookups->v1->phoneNumbers(substr_replace($request->phone_number,'+234',0,1))
                                        ->fetch();

            $user = User::create([
                'user_type' => 'Client',
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make('Password'),
                'phone_number' => substr_replace($request->phone_number,'+234',0,1),
                'i_agree' => $request->i_agree,
            ]);

            return redirect()->route('user.make.payment', Crypt::encrypt($user->id))->with('success_report', 'Complete Registration');

        } catch(Exception $e) {
            return back()->with('failure_report', 'Phone number is not valid');
        }        
    }

    public function payment($user, Request $request)
    {
        $userFinder = Crypt::decrypt($user);

        $user = User::findorfail($userFinder);

        $SECRET_KEY = config('app.paystack_secret_key');

        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $user->email,
            'amount' => 1825 * 100,
            'callback_url' => url('/payment/callback'),
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
            return back()->with('failure_report', 'Payment failed. Response not ok');
        }
    }

    public function handleGatewayCallback()
    {
        $SECRET_KEY = config('app.paystack_secret_key');

        $curl = curl_init();

        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
        if (!$reference) {
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
                'amount' => ($result->data->amount / 100),
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

            return redirect()->route('register', Crypt::encrypt($user->id))->with('success_report', 'Complete Registration');
        }
    }

    public function continue_register()
    {
        return view('auth.continue_register');
    }

    public function post_continue_register(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $input = $request->only(['email', 'password']);

        $user = User::query()->where('email', $request->email)->first();

        // authentication attempt
        if (auth()->attempt($input)) {
            if (($user->amount == 0)) {
                return redirect()->route('user.make.payment', Crypt::encrypt($user->id))->with('success_report', 'Subscription Succesfully, Proceed to payment!');
            }

            if (($user->amount == 1825) and (!$user->email_verified_at)) {
                return redirect()->route('register');
            }

            return back()->with('failure_report', 'Profile setup already, please login');
        } else {
            return back()->with('failure_report', 'User not found in our database.');
        }
    }

    public function register($id)
    {
        $userFinder = Crypt::decrypt($id);

        // dd($userFinder);

        $user = User::find($userFinder);

        // $states = nigeriaStates();
        $countries = CountryListFacade::getList('en');

        return view('auth.register', [
            'user' => $user,
            // 'states' => $states,
            'countries' => $countries
        ]);
    }

    public function post_register($id, Request $request)
    {
        $userFinder = Crypt::decrypt($id);

        $user = User::findorfail($userFinder);

        $this->validate($request, [
            // 'phone_number' => ['required', 'numeric', 'digits:11'],
            'photo' => 'required|mimes:jpeg,png,jpg',
            'gender' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'employment_status' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
            // 'learning_opportunity' => ['required', 'string', 'max:255'],
            'country_of_residence' => ['required', 'string', 'max:255'],
            'state_of_residence' => ['required', 'string', 'max:255'],
            'lga_of_residence' => ['required', 'string', 'max:255'],
            'city_of_residence' => ['required', 'string', 'max:255'],
            'home_address' => ['required', 'string'],
            'business_address' => ['required', 'string', 'max:255'],
            'state_of_origin' => ['required', 'string', 'max:255'],
            'lga_of_origin' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255', 'confirmed'],
            'business_number' => ['required', 'numeric'],
            'whatsapp_number' => ['required', 'numeric'],
            'business_registered' => ['required', 'string', 'max:255'],
            'business_oriented' => ['required', 'string', 'max:255'],
            'business_generate_income' => ['required', 'string'],
            'business_stage' => ['required', 'string'],
            'business_areas' => ['required', 'string', 'max:255'],
            'business_kind' => ['required', 'string', 'max:255'],
            'business_amount' => ['required', 'string', 'max:255'],
            // 'business_financed' => ['required', 'string'],
            'business_time' => ['required', 'string'],
            'asset' => ['required', 'string', 'max:255']
        ]);

        $filename = request()->photo->getClientOriginalName();
        request()->photo->storeAs('users_avatar', $filename, 'public');
        $photo = '/storage/users_avatar/' . $filename;

        $user->update([
            // 'phone_number' => $request->phone_number,
            'photo' => $photo,
            'gender' => $request->gender,
            'status' => $request->status,
            'date_of_birth' => $request->date_of_birth,
            'employment_status' => $request->employment_status,
            'occupation' => $request->occupation,
            'learning_opportunity' => $request->learning_opportunity,
            'country_of_residence' => $request->country_of_residence,
            'state_of_residence' => $request->state_of_residence,
            'lga_of_residence' => $request->lga_of_residence,
            'city_of_residence' => $request->city_of_residence,
            'home_address' => $request->home_address,
            'business_address' => $request->business_address,
            'state_of_origin' => $request->state_of_origin,
            'lga_of_origin' => $request->lga_of_origin,
            'password' => Hash::make($request->password),
            'business_number' => $request->business_number,
            'whatsapp_number' => $request->whatsapp_number,
            'business_registered' => $request->business_registered,
            'business_oriented' => $request->business_oriented,
            'business_generate_income' => $request->business_generate_income,
            'business_stage' => $request->business_stage,
            'business_areas' => $request->business_areas,
            'business_kind' => $request->business_kind,
            'business_amount' => $request->business_amount,
            'business_financed' => $request->business_financed,
            'business_time' => $request->business_time,
            'asset' => $request->asset,
        ]);

        $code = mt_rand(100000, 999999);

        $user->update([
            'code' => $code
        ]);

        
        try {
            $sid = config('app.twilio.sid'); // Your Account SID from www.twilio.com/console
            $auth_token = config('app.twilio.auth_token'); // Your Auth Token from www.twilio.com/console
            $from_number = config('app.twilio.from_number'); // Valid Twilio number

            $client = new Client($sid, $auth_token);

            $client->messages->create(
                $user->phone_number,
                [
                    'messagingServiceSid' => 'MGf6365de4f7bbe21390e3a36580d6b7a1',
                    'from' => $from_number,
                    'body' => 'Hello ' . $user->last_name . ', Your ' . config('app.name') . ' verification code is: ' . $user->code
                ] 
            );
            
            // Send email to user
            $user->notify(new SendVerificationCode($user));

            return redirect()->route('verify.account', Crypt::encrypt($user->email))->with('success_report', 'Registration Succesful, Please verify your account!');
        
        } catch(Exception $e) {
            // return back()->with('failure_report', 'Phone number is not valid');

             // Send email to user
             $user->notify(new SendVerificationCode($user));

             return redirect()->route('verify.account', Crypt::encrypt($user->email))->with('success_report', 'Registration Succesful, Please verify your account!');
        }  
    }

    public function verify_account($email)
    {
        $userFinder = Crypt::decrypt($email);

        $user = User::where('email', $userFinder)->first();

        return view('auth.verify_account', [
            'user' => $user
        ]);
    }

    public function email_verify_resend($email)
    {
        $email = Crypt::decrypt($email);

        $user = User::where('email', $email)->first();

        $code = mt_rand(100000, 999999);

        $user->update([
            'code' => $code
        ]);

        try {
            $sid = config('app.twilio.sid'); // Your Account SID from www.twilio.com/console
            $auth_token = config('app.twilio.auth_token'); // Your Auth Token from www.twilio.com/console
            $from_number = config('app.twilio.from_number'); // Valid Twilio number

            $client = new Client($sid, $auth_token);

            $client->messages->create(
                $user->phone_number, // Text this number
                [
                    'messagingServiceSid' => 'MGf6365de4f7bbe21390e3a36580d6b7a1',
                    'from' => $from_number,
                    'body' => 'Hello ' . $user->last_name . ', Your ' . config('app.name') . ' verification code is: ' . $user->code
                ]
            );
            
            // Send email to user
            $user->notify(new SendVerificationCode($user));

            return back()->with('success_report', 'A fresh verification code has been sent to your email address and phone number.');
        } catch(Exception $e) {
            // return back()->with('failure_report', 'Phone number is not valid');

            // Send email to user
            $user->notify(new SendVerificationCode($user));

            return back()->with('success_report', 'A fresh verification code has been sent to your email address and phone number.');
        }  
    }

    public function registerConfirm($token, Request $request)
    {
        $userfinder = Crypt::decrypt($token);

        $user = User::find($userfinder);

        $this->validate($request, [
            'code' => ['required', 'numeric']
        ]);

        if ($user->code == $request->code) {
            $user->email_verified_at = now();
            $user->code = null;
            $user->save();

            /** Store information to include in mail in $data as an array */
            $data = array(
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email
            );

            try {
                $sid = config('app.twilio.sid'); // Your Account SID from www.twilio.com/console
                $auth_token = config('app.twilio.auth_token'); // Your Auth Token from www.twilio.com/console
                $from_number = config('app.twilio.from_number'); // Valid Twilio number

                $client = new Client($sid, $auth_token);

                $client->messages->create(
                    $user->phone_number, // Text this number
                    [
                        'messagingServiceSid' => 'MGf6365de4f7bbe21390e3a36580d6b7a1',
                        'from' => $from_number,
                        'body' => "Hello " . $user->first_name . " " . $user->last_name . ", \n\nWelcome to Laravel Entrepreneurial Show! \n\nYour account is now active. \n\nWith us, your business can realize its full potential and contribute to a society full of opportunities for innovation and overall development. \n\nGet more information on our FAQ page or Contact Us directly. \n\nBest Regards, \nThe Laravel Team"
                    ]
                );

                /** Send message to the user */
                Mail::send('emails.welcome', $data, function ($m) use ($data) {
                    $m->to($data['email'])->subject(config('app.name'));
                });

                return redirect()->route('login')->with('success_report', 'Account Verified, proceed to login!');

            } catch(Exception $e) {
                // return back()->with('failure_report', 'Phone number is not valid');

               /** Send message to the user */
                Mail::send('emails.welcome', $data, function ($m) use ($data) {
                    $m->to($data['email'])->subject(config('app.name'));
                });

                return redirect()->route('login')->with('success_report', 'Account Verified, proceed to login!');
            }  
        }

        return back()->with('failure_report', 'Incorrect Code');
    }

    public function login()
    {
        // Session::flush();

        Auth::logout();

        return view('auth.login');
    }

    public function user_login(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $input = $request->only(['email', 'password']);

        $user = User::query()->where('email', $request->email)->first();

        if ($user && !Hash::check($request->password, $user->password)) {
            return back()->with('failure_report', 'Incorrect Password!');
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('failure_report', 'Email does\'nt exist');
        }

        // 
        if ($user->user_type == 'Administrator') {
            Auth::logout();

            return back()->with('failure_report', 'Only Users are allowed to login here.');
        }

        // authentication attempt
        if (auth()->attempt($input)) {
            if (($user->amount == 0)) {
                return redirect()->route('user.make.payment', Crypt::encrypt($user->id))->with('success_report', 'Subscription Succesfully, Proceed to payment!');
            }

            if (!$user->email_verified_at) {
                $code = mt_rand(100000, 999999);

                $user->update([
                    'code' => $code
                ]);

                try {
                    $sid = config('app.twilio.sid'); // Your Account SID from www.twilio.com/console
                    $auth_token = config('app.twilio.auth_token'); // Your Auth Token from www.twilio.com/console
                    $from_number = config('app.twilio.from_number'); // Valid Twilio number

                    $client = new Client($sid, $auth_token);

                    $client->messages->create(
                        $user->phone_number, // Text this number
                        [
                            'messagingServiceSid' => 'MGf6365de4f7bbe21390e3a36580d6b7a1',
                            'from' => $from_number,
                            'body' => 'Hello ' . $user->last_name . ', Your ' . config('app.name') . ' verification code is: ' . $user->code
                        ]
                    );
                    
                    // Send email to user
                    $user->notify(new SendVerificationCode($user));
                    
                    return redirect()->route('verify.account', Crypt::encrypt($user->email))->with('success_report', 'Registration Succesful, Please verify your account!');
                
                } catch(Exception $e) {
                    // return back()->with('failure_report', 'Phone number is not valid');
        
                    // Send email to user
                    $user->notify(new SendVerificationCode($user));
        
                    return redirect()->route('verify.account', Crypt::encrypt($user->email))->with('success_report', 'Registration Succesful, Please verify your account!');
                }
            }  

            return redirect()->route('home');
        } else {
            return back()->with('failure_report', 'User authentication failed.');
        }
    }

    public function forget()
    {
        return view('auth.forget');
    }

    public function forget_password(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();

        // Delete all old code that user send before.
        ResetCodePassword::where('email', $request->email)->delete();

        // Generate random code
        $code = mt_rand(100000, 999999);

        // Create a new code
        $codeData = ResetCodePassword::create([
            'email' => $request->email,
            'code' => $code
        ]);

        try {
            $sid = config('app.twilio.sid'); // Your Account SID from www.twilio.com/console
            $auth_token = config('app.twilio.auth_token'); // Your Auth Token from www.twilio.com/console
            $from_number = config('app.twilio.from_number'); // Valid Twilio number

            $client = new Client($sid, $auth_token);

            $client->messages->create(
                $user->phone_number, // Text this number
                [
                    'messagingServiceSid' => 'MGf6365de4f7bbe21390e3a36580d6b7a1',
                    'from' => $from_number,
                    'body' => 'Hello ' . $user->last_name . ', Your ' . config('app.name') . ' reset password code is: ' . $codeData->code
                ]
            );
            // Send email to user
            Mail::to($request->email)->send(new SendCodeResetPassword($codeData->code));

            return redirect()->route('user.reset.password')->with('success_report', 'We have emailed your password reset code!');

        } catch(Exception $e) {
            // return back()->with('failure_report', 'Phone number is not valid');

            // Send email to user
            Mail::to($request->email)->send(new SendCodeResetPassword($codeData->code));

            return redirect()->route('user.reset.password')->with('success_report', 'We have emailed your password reset code!');
        }
    }

    public function password_reset_email()
    {
        return view('auth.reset_password');
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:reset_code_passwords',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (ResetCodePassword::where('code', '=', $request->code)->exists()) {
            // find the code
            $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

            // check if it does not expired: the time is one hour
            if ($passwordReset->created_at > now()->addHour()) {
                $passwordReset->delete();

                return back()->with('failure_report', 'Password reset code expired');
            }

            // find user's email 
            $user = User::firstWhere('email', $passwordReset->email);

            // update user password
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            // delete current code 
            $passwordReset->delete();

            return redirect()->route('login')->with('success_report', 'Password has been successfully reset, Please login');
        } else {
            return back()->with('failure_report', 'Code does\'nt exist in our database');
        }
    }

    public function sms()
    {
        $sid = config('app.twilio.sid'); // Your Account SID from www.twilio.com/console
        $auth_token = config('app.twilio.auth_token'); // Your Auth Token from www.twilio.com/console
        $from_number = config('app.twilio.from_number'); // Valid Twilio number

        $client = new Client($sid, $auth_token);

        $facebook = 'https://www.facebook.com/';

        $message = $client->messages->create(
            '+2348161215848', // Text this number
            [
                'messagingServiceSid' => 'MGf6365de4f7bbe21390e3a36580d6b7a1',
                'from' => $from_number,
                'body' => "Hello ".$facebook.", \n \n Welcome to Laravel Entrepreneurial Show! \n\n Your account is now active. \n\n With us, your business can realize its full potential and contribute to a society full of opportunities for innovation and overall development. \n\n Get more information on our FAQ page or Contact Us directly. \n\n Best Regards, \n The Laravel Team"
            ]
        );

        dd($message);
    }

    public function admin_login()
    {
        return view('auth.admin_login');
    }

    public function post_admin_login(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $input = $request->only(['email', 'password']);

        $user = User::query()->where('email', $request->email)->first();

        if ($user && !Hash::check($request->password, $user->password)) {
            return back()->with('failure_report', 'Incorrect Password!');
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('failure_report', 'Email does\'nt exist');
        }

        // authentication attempt
        if (auth()->attempt($input)) {
            if ($user->user_type == 'Administrator') {
                return redirect()->route('admin.dashboard');
            }

            return back()->with('failure_report', 'You are not an Administrator');
        } else {
            return back()->with('failure_report', 'User authentication failed.');
        }
    }
}
