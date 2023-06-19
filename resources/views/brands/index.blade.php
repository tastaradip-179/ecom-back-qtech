@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="mt-5 mb-3 flex">
        <div style="float: right">
            <a href="{{ route('brands.create') }}" class="btn btn-success">Add New Brand</a>
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a></div>
      </div>
    </div>
    <div class="row mb-5 mt-3">
        <h2>All Brands</h2>
    </div>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td></td>
                    <td>{{$brand->name}}</td>
                    <td>
                        <a href="{{ route('brands.show', $brand->id) }}" class="btn btn-info mr-3">View</a>
                        <a href="{{ route('brands.destroy', $brand->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        {{$brands->render('pagination::bootstrap-4')}}
    </div>
</div>
@endsection