<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index',['products' => Product::all() ]);
    }
    public function add(){

        return view('admin.product.add',['category' => Category::all() ]);
    }
    public function insert(Request $request){
        
        $request->validate([
            
            'cate_id' => 'required',
            'name' => 'required',   
            'slug' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'tax' => 'required',
            'qty' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'image' => 'required',


        ]);

        $products = new Product();
      
    if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/',$filename);
            $products->image = $filename;
    
    }
    $products->cate_id = $request->input('cate_id');
    $products->name = $request->input('name');
    $products->slug = $request->input('slug');
    $products->small_description = $request->input('small_description');
    $products->description = $request->input('description');
    $products->original_price = $request->input('original_price');
    $products->selling_price = $request->input('selling_price');
    $products->tax = $request->input('tax');
    $products->qty = $request->input('qty');
    $products->status = $request->input('status') == TRUE ? '1':'0';
    $products->trending = $request->input('trending')== TRUE ? '1':'0';
    $products->meta_title = $request->input('meta_title');
    $products->meta_description = $request->input('meta_description');
    $products->meta_keywords = $request->input('meta_keywords');
 

    

        $products->save();
    
        return redirect('products')->with('status',"product Added Successfully");

    }

    public function edit($id){

        return view('admin.product.edit',['products' => Product::findOrFail($id) ]);


    }

    public function update(Request $request ,$id){
        
        $products = Product::findOrFail($id);

      
    if($request->hasFile('image'))
    {
            $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/',$filename);
            $products->image = $filename;
    
    }
    $products->name = $request->input('name');
    $products->slug = $request->input('slug');
    $products->small_description = $request->input('small_description');
    $products->description = $request->input('description');
    $products->original_price = $request->input('original_price');
    $products->selling_price = $request->input('selling_price');
    $products->tax = $request->input('tax');
    $products->qty = $request->input('qty');
    $products->status = $request->input('status') == TRUE ? '1':'0';
    $products->trending = $request->input('trending')== TRUE ? '1':'0';
    $products->meta_title = $request->input('meta_title');
    $products->meta_description = $request->input('meta_description');
    $products->meta_keywords = $request->input('meta_keywords');
 

    

        $products->update();
    
        return redirect('products')->with('status',"product Updated Successfully");

    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);

      
        if($products->image)
        {
                $path = 'assets/uploads/products/'.$products->image;
                if(File::exists($path)){
                    File::delete($path);
                }
        }

       
       $products->delete();
       return redirect('products')->with('status',"Product deleted Successfully");


    }




}
