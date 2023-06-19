@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="mt-5 mb-3 flex">
        <div style="float: right">
            <a href="{{ route('sellers.create') }}" class="btn btn-success">Add New Seller</a>
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
        </div>
      </div>
    </div>
    <div class="row mb-5 mt-3">
        <h2>All Sellers</h2>
    </div>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
                @foreach($sellers as $seller)
                <tr>
                    <th scope="row">{{$seller->id}}</th>
                    <td>{{$seller->name}}</td>
                    <td>
                        <a href="{{ route('sellers.show', $seller->id) }}" class="btn btn-info mr-3">View</a>
                        <a href="{{ route('sellers.destroy', $seller->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        {{$sellers->render('pagination::bootstrap-4')}}
    </div>
</div>
@endsection