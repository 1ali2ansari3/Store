@extends('layouts.admin')

@section('content')
<div class="card">
     <h4>category page</h4> <br>
     <hr>
     <table class="table table-bordered table-striped" >
          <thead>        
               <tr>
                    <th>Id</th>              
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
               </tr>
          </thead>
          <tbody>
               @foreach($categorys as $item)
               <tr>
                   <td>{{ $item['id'] }}</td>
                   <td>{{ $item['name'] }}</td>
                   <td  class="description"> {{ $item['description'] }}</td>
                   <td>
                    <img src="{{ asset('assets/uploads/categpry/'.$item['image']) }}" class="cate-image" alt="jg">
                   </td>
                   <td>
                   <a href="{{ route('category.edit', [ $item['id']] ) }}" class ="btn btn-primary">Edit</a>
                   <a href="{{ url('delete-category', [ $item['id']] ) }}" enctype="multipart/form-data" class ="btn btn-danger">Delete</a>
                    </td>   
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
@endsection