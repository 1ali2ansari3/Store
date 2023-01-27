@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Registered users</h4><br>
        <hr>
    </div>
     <table class="table table-bordered table-striped" >
          <thead>        
               <tr>
                    <th>Id</th>               
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
               </tr>
          </thead>
          <tbody>
               @foreach($users as $item)
               <tr>
                   <td>{{ $item['id'] }}</td>
                   <td>{{ $item['name'].' '.$item['lname'] }}</td>
                   <td  class="description"> {{ $item['email'] }}</td>
                   <td>{{ $item['phone'] }}</td>
                   <td>
                      <a href="{{ url('view-user', [ $item['id']] ) }}"  class ="btn btn-danger btn-sm">View</a>
                    </td>   
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
@endsection