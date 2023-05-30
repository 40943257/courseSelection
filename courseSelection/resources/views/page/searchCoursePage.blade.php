@extends('page.layout.master')

@section('title', 'sarchCourse')

@section('content')
    <div class="container my-1">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form action="{{ route('page.searchResultsPage') }}" method="GET">
                    {{ csrf_field() }}
                    @include('page.layout.error')
                    <div class="mb-3">
                        <label for="courseId" class="form-label">課號</label>
                        <input type="text" class="form-control" name="courseId" id="courseId" placeholder="課號">
                    </div>
                    <div class="mb-3">
                        <label for="courseName" class="form-label">課名</label>
                        <input type="text" class="form-control" name="courseName" id="courseName" placeholder="課名">
                    </div>
                    <div class="mb-3">
                        <label for="teacherName" class="form-label">老師名</label>
                        <input type="text" class="form-control" name="teacherName" id="teacherName" placeholder="老師名">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="day" name="day">
                            <option value="-1">星期</option>
                            <option value="Mon">星期一</option>
                            <option value="Tuse">星期二</option>
                            <option value="Thrs">星期三</option>
                            <option value="Wend">星期四</option>
                            <option value="Fri">星期五</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="credit" name="credit">
                            <option value=-1>學分數</option>
                            <option value=0>0學分</option>
                            <option value=1>1學分</option>
                            <option value=2>2學分</option>
                            <option value=3>3學分</option>
                        </select>
                    </div>
                    <div class=" d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary mx-1 my-1">查詢</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
@endsection
