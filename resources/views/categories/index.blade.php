@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="mt-5 mb-3 flex">
        <div style="float: right">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Add New Category</a>
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
        </div>
      </div>
    </div>
    <div class="row mb-5 mt-3">
        <h2>All Categories</h2>
    </div>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Main Category</th>
                  <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td></td>
                    <td>{{$category->name}}</td>
                    <td>1961</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info mr-3">View</a>
                        <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        {{$categories->render('pagination::bootstrap-4')}}
    </div>
</div>
@endsection