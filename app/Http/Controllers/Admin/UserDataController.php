<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

        $user = User::all();
        
        $data = array();

        foreach ($user as $value) {
            array_push($data, $value['name'], $value['email'])  ;
        }

        return ["draw"=> $user->count(),
                "recordsTotal"=> $user->count(),
                "recordsFiltered"=> $user->count(), 
                "data"=>[$data]
            ];
    }
}
