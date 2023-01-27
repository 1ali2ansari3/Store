@extends('layouts.admin')

@section('content')
    
    


    <div class="card" stayle="">

    <h4> add Ctegory</h4> <br>
        <form action="{{ route('category.update', [ $category['id'] ]) }}" method='post' enctype="multipart/form-data" >
            @csrf
            @method('PUT')
                <div class = "row">  
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                         <div class="input-group input-group-outline">
                             <input type="text" name="name" class="form-control" value="{{$category->name}}">
                         </div>
                         @error('name')
                             <div class="from-error">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
         
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Slug</label>
                        <div class="input-group input-group-outline">
                            <input type="text" name="slug" class="form-control" value="{{$category->slug}}">
                        </div>
                           
                    </div>

                    <div class="col-md-12 mb-3">
                        
                            <label class="form-label">Description</label>
                         <div class="input-group input-group-outline">   
                            <textarea type="text" name="description" rows="3" class="form-control">{{ $category->description }}</textarea>
                           
                        </div>    
                    </div>

                    <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input  name="status" type="checkbox" {{$category->status == "1" ? 'checked' : ''}}>
                            
                    </div>
                    <div class="col-md-6 mb-3">
                            <label for="">Popular</label>
                            <input  name="popular"  type="checkbox" {{$category->popular == "1" ? 'checked':'' }} >
                           
                    </div>


                    <div class="col-md-12 mb-3">
                        <label class="form-label">Meta Title</label>
                        <div class="input-group input-group-outline">  
                      
                            <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}">
                          
                        </div>    
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Meta keywords</label>
                        <div class="input-group input-group-outline"> 
                            <textarea  name="meta_keywords" rows="3" class="form-control">{{$category->meta_keywords}}</textarea>
                            
                        </div>    
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Meta Description</label>
                            <div class="input-group input-group-outline">
                            <textarea name="meta_description" rows="3" class="form-control">{{$category->meta_descrip}}</textarea>
                          
                        </div>    
                    </div>
                    
                    @if($category->image)
                            <img src="{{ asset('assets/uploads/categpry/'.$category->image)}}" class="cate-image" alt="category image">
                    @endif
                  

                    <div class="col-md-12">
                            <input  name="image" type="file">
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