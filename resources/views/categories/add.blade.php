@extends('layouts.app')
@section('content')
        <div class="container mx-auto">
            <div class="mt-5">
                <h4 class="mt-5 text-center font-medium text-lg">Add A New Category</h4>
                <form action="{{ route('categories.store') }}" method="post" class="p-5">
                    @include('categories.form')
                </form> 
            </div>
        </div>
@endsection  