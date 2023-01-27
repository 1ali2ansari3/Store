@extends('layouts.admin')

@section('content')
    
    


    <div class="card" stayle="">

    <h4> add Product</h4> <br>
        <form action="{{ route('product.update', [ $products['id'] ]) }}" method='post' enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class = "row"> 
                    <div class="col-md-7 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option value="">{{$products->category->name}}</option>
                         
                        </select>
                    </div> 
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <div class="input-group input-group-outline">
                             <input type="text" name="name" class="form-control" value="{{$products->name}}">
                             @error('name')
                                {{$message}}
                            @enderror
                         </div>
                    </div>
         
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Slug</label>
                        <div class="input-group input-group-outline">
                            <input type="text" name="slug" class="form-control" value="{{$products->slug}}">
                            @error('slug')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Small Description</label>
                     <div class="input-group input-group-outline">   
                        <textarea type="text" name="small_description" rows="3" class="form-control">{{$products->small_description}}</textarea>
                        @error('description')
                            {{$message}}
                        @enderror
                    </div>    
                </div>

                    <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                         <div class="input-group input-group-outline">   
                            <textarea type="text" name="description" rows="3" class="form-control">{{$products->description}}</textarea>
                            @error('description')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Original Price</label>
                        <div class="input-group input-group-outline">
                            <input type="number" name="original_price" class="form-control" value="{{$products->original_price}}">
                            @error('original price')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Selling Price</label>
                        <div class="input-group input-group-outline">
                            <input type="number" name="selling_price" class="form-control" value="{{$products->selling_price}}">
                            @error('selling price')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tax</label>
                        <div class="input-group input-group-outline">
                            <input type="number" name="tax" class="form-control" value="{{$products->tax}}">
                            @error('Tax')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Quantity</label>
                        <div class="input-group input-group-outline">
                            <input type="number" name="qty" class="form-control" value="{{$products->qty}}">
                            @error('Quantity')
                                {{$message}}
                            @enderror
                        </div>    
                    </div> 

                    <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input  name="status" type="checkbox" {{$products->status == "1" ? 'checked' : ''}}>
                            @error('status')
                                {{$message}}
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                            <label for="">Trending</label>
                            <input  name="trending"  type="checkbox" {{$products->trending == "1" ? 'checked' : ''}}>
                            @error('trending')
                                {{$message}}
                            @enderror
                    </div>


                    <div class="col-md-12 mb-3">
                        <label class="form-label">Meta Title</label>
                        <div class="input-group input-group-outline">  
                            <input type="text" name="meta_title" class="form-control" value="{{$products->meta_title}}">
                            @error('meta title')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Meta keywords</label>
                        <div class="input-group input-group-outline"> 
                            <textarea  name="meta_keywords" rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
                            @error('meta keywords')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Meta Description</label>
                            <div class="input-group input-group-outline">
                            <textarea name="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
                            @error('meta description')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>
                    
                    @if($products->image)
                    <img src="{{ asset('assets/uploads/products/'.$products->image)}}" class="cate-image" alt="category image">
                    @endif

                    <div class="col-md-12">
                            <input  name="image" type="file">
                            @error('image')
                                {{$message}}
                            @enderror
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12">
                            <button type="submit" class ="btn btn-primary">Update</button>
                    </div>
                </div>           
        </form>
                   
    </div>

@endsection