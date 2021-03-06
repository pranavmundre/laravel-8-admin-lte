<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Auth, Hash, Mail;
use App\Models\Admin;

class AdminController extends Controller
{
    public function authenticate(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->get('remember'))){

            return redirect()->route('admin.dashboard');

        }
        else{
            session()->flash('error', 'Email or Password is incorrect.');

            return back()->withInput($request->only('email'));
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }


    public function my_profile()
    {
        $user = Auth::user();

        return view('admin.my_profile', ['user' => $user]);
    }



    public function update_profile(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'profile_pic' => 'mimes:jpg,png,jpeg',

        ]);

        $user = Admin::find(Auth::user()->id);
        $user->firstname  = $request->input('firstname');
        $user->lastname  = $request->input('lastname');

        if ($request->hasFile('profile_pic')) {

		    if (!$request->file('profile_pic')->isValid()) {
        		return redirect()->back()->withErrors(['profile_pic'=> 'upload valid image.']);
			}

			$path = $request->profile_pic->store('public/images');

			$user->profile_pic = str_replace( 'public', 'storage', $path,);
			
		}

        $user->update();

        session()->flash('user_status', 'Profile Updated');

        return redirect()->back();
    }

    public function change_password(Request $request)
    {
        $user = Auth::user();
        $user_password = Auth::user()-> password;

        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|min:6|same:confirm_new_password',
            'confirm_new_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $user_password)) {
            return back()->withErrors(['current_password'=>'Current password is incorrect.']);
        }

        $user->password  = Hash::make($request->input('new_password'));
        $user->save();


        $data = array('name'=> $user->firstname, 'email'=> $user->email);

        Mail::send('admin.mails.change-password', $data, function($message) use ($data) {
             $message->to($data['email'], config('app.name'));
             $message->subject('password changed successfully');
             $message->from(config('mail.from.address'), 'no reply');
          });

        return redirect()->back()->with('success','password successfully updated');
    }


}
