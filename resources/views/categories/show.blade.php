@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Category Details</div>
                <div class="card-body">
                    <form action="{{ route('categories.update', ['category'=> $category]) }}" method="post">
                        @include('categories.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  