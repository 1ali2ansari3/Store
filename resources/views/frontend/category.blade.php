@extends('layouts.front')

@section('title','Category')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <h2>All Category</h2>
                    <div class="row">
                        @foreach ($category as $cate)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ url('categorys/'.$cate->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/categpry/'.$cate->image) }}" height="250px"alt="Product image">
                                        <div class="card-body">
                                            <h5>{{ $cate->name }}</h5>
                                        <p>
                                            {{ $cate->description }} 
                                        </p>
                                        </div>
                                    </div>
                                    </a>
                               </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>


@endsection