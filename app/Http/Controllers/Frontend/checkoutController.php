<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Session;
use Stripe;

class checkoutController extends Controller
{



    
    public function index(){
    
        $old_cartitems = Cart::where('user_id',Auth::id())->get();
      
        foreach($old_cartitems as $item)
        {
            $ver = Product::where('id',$item['prod_id'])->first();
            if($ver->qty  < $item['prod_qty']){
                
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
                
                //return redirect('/cart')->with('status', $item['id']);
            }
        }

        return view('frontend.checkout' , ['cartitems' => Cart::where('user_id',Auth::id())->get()]);

    }

    

    public function placeorder(Request $request){

        $order = new Order();
        $order->user_id = Auth::id();

        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total +=$prod->products->selling_price * $prod->prod_qty;
        }

        $order->total_price = $total;

        $order->fname = $request->input('cfname');
        $order->lname = $request->input('clname');
        $order->email = $request->input('cemail');
        $order->phone = $request->input('cphone');
        $order->adress1 = $request->input('cadress1');
        $order->adress2 = $request->input('cadress2');
        $order->city = $request->input('ccity');
        $order->state = $request->input('cstate');
        $order->country = $request->input('ccountry');
        $order->pincode = $request->input('cpincode');
        $order->tracking_no = 'sharma'.rand(1111,9999);
        $order->save();

        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id',$item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('cfname');
            $user->lname = $request->input('clname');
            $user->phone = $request->input('cphone');
            $user->adress1 = $request->input('cadress1');
            $user->adress2 = $request->input('cadress2');
            $user->city = $request->input('ccity');
            $user->state = $request->input('cstate');
            $user->country = $request->input('ccountry');
            $user->pincode = $request->input('cpincode');
            $user->update();



        $cartitems = Cart::where('user_id',Auth::id())->get(); 
        Cart::destroy($cartitems);

        return redirect('/')->with('status', "Order placed Successfully");

        

    }

    public function stripe(Request $request){

        $cartitems = Cart::where('user_id' , Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item)
        {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }

        $cfname = $request->input('fname');
        $clname = $request->input('clname');
        $cemail = $request->input('cemail');
        $cphone = $request->input('cphone');
        $cadress1 = $request->input('cadress1');
        $cadress2 = $request->input('cadress2');
        $ccity = $request->input('ccity');
        $cstate = $request->input('cstate');
        $ccountry = $request->input('ccountry');
        $cpincode = $request->input('cpincode');

        return response()->json([
            'cfname' => $cfname ,
            'clname' => $clname ,
            'cemail' => $cemail ,
            'cphone' => $cphone ,
            'cadress1' => $cadress1 ,
            'cadress2' => $cadress2 ,
            'ccity' => $ccity ,
            'cstate' => $cstate , 
            'ccountry' => $ccountry ,
            'cpincode' => $cpincode ,
            'total_price' => $total_price
        ]);
    }

    
    public function stripePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount' => $request->input('total')*100,
            'currency' => "usd",
            'source' => $request->stripeToken,
            'description' => 'Test payment from AABIL',

        ]);
      
        return  redirect('/')->with('status', "Order and Payments placed Successfully");
    }

    public function byderict(Request $request){

        $order = new Order();
        $order->user_id = Auth::id();

        
        $order->total_price = $request->input('ctotal');

        $order->fname = $request->input('cfname');
        $order->lname = $request->input('clname');
        $order->email = $request->input('cemail');
        $order->phone = $request->input('cphone');
        $order->adress1 = $request->input('cadress1');
        $order->adress2 = $request->input('cadress2');
        $order->city = $request->input('ccity');
        $order->state = $request->input('cstate');
        $order->country = $request->input('ccountry');
        $order->pincode = $request->input('cpincode');
        $order->tracking_no = 'sharma'.rand(1111,9999);
        $order->save();

            $id = $request->input('cid');
            $TB = $request->input('ctotal');
            $QB = $request->input('cquantity');
            $PB = $request->input('cprix');

            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id' => $id,
                'qty' => $QB,
                'price' => $PB,
            ]);

            $prod = Product::where('id',$id)->first();
            $prod->qty = $prod->qty - $QB;
            $prod->update();



            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('cfname');
            $user->lname = $request->input('clname');
            $user->phone = $request->input('cphone');
            $user->adress1 = $request->input('cadress1');
            $user->adress2 = $request->input('cadress2');
            $user->city = $request->input('ccity');
            $user->state = $request->input('cstate');
            $user->country = $request->input('ccountry');
            $user->pincode = $request->input('cpincode');
            $user->update();

        



        return redirect('/')->with('status', "Order placed Successfully");


    }

    public function ByNow(Request $request){

        $quantity = $request->input('quantity');
        $name = $request->input('name');
        $prix = $request->input('prix');
        $id = $request->input('id');

        $ver = Product::where('id',$id)->first();
        $cat = Category::where('id',$ver->cate_id)->first();

  if($ver->qty >= $quantity){

      return view('frontend.bynow' ,compact('quantity','name','prix','id'));
  }
  else {
      return redirect('/categorys/'.$cat->slug.'/'.$ver->slug)->with('status', "Unfortunately, the quantity currently available is only ".$ver->qty." pieces");
  }

  }
}
