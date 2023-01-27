<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index',['categorys' => Category::all() ]);
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request){
        
        $request->validate([
            'name' => 'required',
            'slug' => 'required',   
            'description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'image' => 'required',

        ]);

        $category = new Category();
      
    if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/categpry/',$filename);
            $category->image = $filename;
    
    }
    $category->name = $request->input('name');
    $category->slug = $request->input('slug');
    $category->description = $request->input('description');
    $category->status = $request->input('status') == TRUE ? '1':'0';
    $category->popular = $request->input('popular')== TRUE ? '1':'0';
    $category->meta_title = $request->input('meta_title');
    $category->meta_descrip = $request->input('meta_description');
    $category->meta_keywords = $request->input('meta_keywords');
    

        $category->save();
    
        return redirect('/dashboard')->with('status',"Category Added Successfully");

    }

    public function edit($id)
    {
        return view('admin.category.edit' , ['category' => category::findOrFail($id) ]);
        
    }

    public function update(Request $request ,$id){

        

        
        $category = Category::findOrFail($id);

      
    if($request->hasFile('image'))
    {
            $path = 'assets/uploads/categpry/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/categpry/',$filename);
            $category->image = $filename;
    
    }
    $category->name = $request->input('name');
    $category->slug = $request->input('slug');
    $category->description = $request->input('description');
    $category->status = $request->input('status') == TRUE ? '1':'0';
    $category->popular = $request->input('popular')== TRUE ? '1':'0';
    $category->meta_title = $request->input('meta_title');
    $category->meta_descrip = $request->input('meta_description');
    $category->meta_keywords = $request->input('meta_keywords');
 

    

        $category->update();
    
        return redirect('/dashboard')->with('status',"Category Update Successfully");

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

      
        if($category->image)
        {
                $path = 'assets/uploads/categpry/'.$category->image;
                if(File::exists($path)){
                    File::delete($path);
                }
        }

       
       $category->delete();
       return redirect('/dashboard')->with('status',"Category deleted Successfully");


    }

}
