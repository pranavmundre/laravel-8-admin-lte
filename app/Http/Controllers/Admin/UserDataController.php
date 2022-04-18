<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserDataController extends Controller
{
    public function index()
    {
        return view('admin.user-list');
    }


    public function userTableData(Request $request)
    {

        $search = $request->input('search')['value'];
        $order = $request->input('order');
        $length = (int)$request->input('length');
        $start = (int)$request->input('start');
        $draw = (int)$request->input('draw');

        $recordsTotal = User::all()->count();
        $recordsFiltered = $recordsTotal; 

        // print_r($start);
        
        if ($search){
            $user = User::where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere ( 'email', 'LIKE', '%' . $search . '%' );
                        

            $recordsFiltered = $user->count();

            $user = $user->skip($start)->take($length)->get();
        }
        else{
            $user = User::skip($start)->take($length)->get();
        }
        
        $data = array();
        foreach ($user as $value) {
            array_push($data, array($value['name'], $value['email']))  ;
        }

        return [
            "draw"=> $draw,
            "recordsTotal"=> $recordsTotal,
            "recordsFiltered"=> $recordsFiltered, 
            "data"=>$data
        ];
    }

    public function add_user(Request $request)
    {

        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'password' => 'required|min:6',
        ]);

        try {
            $user = new User;
            $user->name = $request->input('firstname').' '.$request->input('lastname');
            $user->email = $request->input('email');
            $user->password  = Hash::make($request->input('password'));
            $user->save();

        } 
        // catch (Illuminate\Database\QueryException $e){
        catch (Exception $e){
            $errorCode = $e->errorInfo[1];

            if($errorCode == 1062){
                return redirect()->back()->with('error','User already exist with this details.');
            }
        }


        $data = array(
            'name'=> $user->name, 
            'email'=> $user->email, 
            'password'=> $request->input('password')
        );

        Mail::send(['text'=>'admin.mails.add-new-user'], $data, function($message) use ($data) {
             $message->to($data['email'], config('app.name'));
             $message->subject(config('app.name').' | your account  has created');
             $message->from(config('mail.from.address'), 'no reply');
          });

        return redirect()->back()->with('success','User successfully created.');
    }
}
