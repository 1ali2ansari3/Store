<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){

        return view('admin.orders.index',['orders' => Order::where('status','0')->get()]);

    }
    
    public function view($id){

        return view('admin.orders.view',['orders' => Order::where('id',$id)->first()]);

    }

    public function updateorder(Request $request , $id){

        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status',"Order Updated Successfully");
    
    } 

   
    public function  orderhistory(){

        return view('admin.orders.history',['orders' => Order::where('status','1')->get()]);

    } 

    
}
