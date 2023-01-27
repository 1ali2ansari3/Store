<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){

       
         return view('frontend.orders.index' , ['orders' => Order::where('user_id',Auth::id())->get()]);

    }

    public function view($id)
    {
        return view('frontend.orders.view' , ['orders' => Order::where('id',$id)->where('user_id', Auth::id())->first()]);
    }
}
