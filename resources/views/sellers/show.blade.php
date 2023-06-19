@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Seller Details</div>
                <div class="card-body">
                    <form action="{{ route('sellers.update', ['seller'=> $seller]) }}" method="post">
                        @include('sellers.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  