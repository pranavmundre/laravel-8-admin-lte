<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function dashboard(){
        // echo "hello";

        $total_user = User::all()->count();


        return view('admin.dashboard', ["total_user"=> $total_user]);
    }
}
