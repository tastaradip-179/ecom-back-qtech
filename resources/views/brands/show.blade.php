@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Brand Details</div>
                <div class="card-body">
                    <form action="{{ route('brands.update', ['brand'=> $brand]) }}" method="post">
                        @include('brands.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  