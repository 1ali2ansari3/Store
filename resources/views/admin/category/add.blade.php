@extends('layouts.admin')

@section('content')
    
    


    <div class="card" stayle="">

    <h4> add Ctegory</h4> <br>
        <form action="{{ url('insert-category') }}" method='post' enctype="multipart/form-data">
            @csrf
                <div class = "row">  
                    <div class="col-md-6 mb-3">
                         <div class="input-group input-group-outline">
                        
                             <label class="form-label">Name</label>
                               
                             <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                          
                         </div>
                         @error('name')
                             <div class="from-error">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                   
                    
         
                    <div class="col-md-6 mb-3">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control"  value="{{ old('slug') }}">
                           
                        </div> 
                        @error('slug')
                        <div class="from-error">
                            {{$message}}
                        </div>
                        @enderror   
                    </div>
                    

                    <div class="col-md-12 mb-3">
                        
                            <label class="form-label">Description</label>
                         <div class="input-group input-group-outline">   
                            <textarea type="text" name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <div class="from-error">
                                {{$message}}
                            </div>
                            @enderror   
                            
                    </div>

                    <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input  name="status" type="checkbox">
                           
                    </div>
                    <div class="col-md-6 mb-3">
                            <label for="">Popular</label>
                            <input  name="popular"  type="checkbox">
                           
                    </div>


                    <div class="col-md-12 mb-3">
                        <div class="input-group input-group-outline">  
                         <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control"  value="{{ old('meta_title') }}">
                             
                        </div> 
                         @error('meta_title')
                            <div class="from-error">
                                {{$message}}
                            </div>
                            @enderror    
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Meta keywords</label>
                        <div class="input-group input-group-outline"> 
                            <textarea  name="meta_keywords" rows="3" class="form-control">{{ old('meta_keywords') }}</textarea>
                            
                        </div> 
                         @error('meta_keywords')
                            <div class="from-error">
                                {{$message}}
                            </div>
                            @enderror     
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Meta Description</label>
                            <div class="input-group input-group-outline">
                            <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description') }}</textarea>
                              
                        </div>  
                        @error('meta_description')
                            <div class="from-error">
                                {{$message}}
                            </div>
                            @enderror   
                    </div>
                    
                     

                    <div class="col-md-12">
                            <input  name="image" type="file">
                            @error('image')
                            <div class="from-error">
                                {{$message}}
                            </div>
                            @enderror   
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12">
                            <button type="submit" class ="btn btn-primary">Submit</button>
                    </div>
                </div>           
        </form>
                   
    </div>

@endsection