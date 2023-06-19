@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="mt-5 mb-3 flex">
        <div style="float: right">
            <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
        </div>
      </div>
    </div>
    <div class="row mb-5 mt-3">
        <h2>All Products</h2>
    </div>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Code</th>
                  <th scope="col">Category</th>
                  <th scope="col">Price</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>
                        <img style="width: 100px" src="{{ $file_path_view.$product->getImage() }}" alt="Thumbnail">
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info mr-3">View</a>
                        <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        {{$products->render('pagination::bootstrap-4')}}
    </div>
</div>
@endsection