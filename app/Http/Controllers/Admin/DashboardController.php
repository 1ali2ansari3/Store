<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function users(){

        
        return view('admin.users.index',['users' => User::all()]);


    }


    public function viewuser($id){
        
        return view('admin.users.view',['users' => User::find($id)]);

    }
}
