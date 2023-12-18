@extends('page.layout.master')

@section('title', 'myCurriculumPage')

@section('content')
    <div class="container">
        <div class="row">
            @include('page.layout.curriculum')
        </div>
        <div class="row">
            <a href=" {{ route('page.downloadMyCurriculum') }} ">下載</a>
        </div>
    </div>
@endsection
