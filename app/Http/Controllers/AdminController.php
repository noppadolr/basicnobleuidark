<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function AdminDashboard()
   {

       return view('admin.dashboard');
   }
   //end method

    public function AdminLogin(){
       return view('admin.login');
    }
    //end method

    public function AdminProfile(){
        $adminData = User::query()->find(Auth::user()->id);
       return view('admin.profile',compact('adminData'));
    }
}
