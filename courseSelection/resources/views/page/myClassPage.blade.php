@extends('page.layout.master')

@section('title', 'myClass')

@section('content')
    <div class="container">
        <div class="row">
            @include('page.layout.curriculum')
        </div>
    </div>
@endsection
