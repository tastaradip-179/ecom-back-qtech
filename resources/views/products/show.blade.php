@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Product Details</div>
                <div class="card-body">
                    <form action="{{ route('products.update', ['product'=> $product]) }}" method="post">
                        @include('products.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  