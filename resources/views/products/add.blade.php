@extends('layouts.app')
@section('content')
        <div class="container mx-auto">
            <div class="mt-5">
                <h4 class="mt-5 text-center font-medium text-lg">Add A New Product</h4>
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="p-5">
                    @include('products.form')
                </form> 
            </div>
        </div>
@endsection  