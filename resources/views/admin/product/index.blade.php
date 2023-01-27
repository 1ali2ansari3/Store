@extends('layouts.admin')

@section('content')
<div class="card">
     <h4>Product page</h4> <br>
     <hr>
     <table class="table table-bordered table-striped" >
          <thead>        
               <tr>
                    <th>Id</th>  
                    <th>Category</th>              
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
               </tr>
          </thead>
          <tbody>
               @foreach($products as $item)
               <tr>
                   <td>{{ $item['id'] }}</td>
                   <td>{{ $item->category->name }}</td>
                   <td>{{ $item['name'] }}</td>
                   <td  class="description"> {{ $item['selling_price'] }}</td>
                   <td>
                    <img src="{{ asset('assets/uploads/products/'.$item['image']) }}" class="cate-image" alt="jg">
                   </td>
                   <td>
                   <a href="{{ route('product.edit', [ $item['id']] ) }}" class ="btn btn-primary btn-sm">Edit</a>
                   <a href="{{ url('delete-products', [ $item['id']] ) }}" enctype="multipart/form-data" class ="btn btn-danger btn-sm">Delete</a>
                    </td>   
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
@endsection