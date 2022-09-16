<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;
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

        return view('admin.dashboard', [
            'totalactiveusers' => $totalactiveusers,
            'totalinactiveusers' => $totalinactiveusers,
            'latestusers' => $latestusers,
            'deposits' => $deposits
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

        // $user->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'User Deleted!'
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
}
