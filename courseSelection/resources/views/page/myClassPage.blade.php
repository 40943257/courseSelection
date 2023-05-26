@extends('page.layout.master')

@section('title', 'signup')

@section('content')
<div class="container">  
    {{-- @foreach($times as $time)
        {{ $time }}
    @endforeach --}}
    <div class="row">  
        @include('page.layout.curriculum')
    </div>
</div>
@endsection