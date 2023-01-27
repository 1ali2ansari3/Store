<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;




class WishlistController extends Controller
{
    public function index(){

        return view('frontend.wishlist' , ['wishlist' => Wishlist::where('user_id',Auth::id())->get()]);

    
    }

    public function add(Request $request){
        
         
        if(Auth::check())
         {
                $prod_id = $request->input('product_id');
                
                if(Product::find($prod_id))
                {
                    if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                    {
                         return response()->json(['status' => "Product Already Added to Wishlist"]);
                    }
                    else
                    {
                        $wish = new Wishlist();
                        $wish->prod_id = $prod_id;
                        $wish->user_id = Auth::id();
                        $wish->save();
                        return response()->json(['status' => "Product Added to Wishlist"]);
                    }
                }
                else
                {
                    return response()->json(['status' => "Product doesnot exist"]);  
                }
         }
         else
         {
            return response()->json(['status' => "Login to Continue"]);  
         } 

    }


    
    public function deleteitem(Request $request){

        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $wish = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Item Removed from Wishlist"]);
            }

        }
        else
        {   
            return response()->json(['status' => "Login to Continue"]);
        }

    }
   
    
    public function wishlistcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
    


}
