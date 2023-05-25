@extends('page.layout.master')

@section('title', 'addCourse')

@section('content')
<div class="container">    
    <form action="{{ route('page.addCourse') }}" method="POST">  
        <div class="row">
            {{ csrf_field() }}
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <div class="mb-3">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="col-md col"></div>
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 mx-1 my-1">
                            <label for="name" class="form-label">課名</label>
                            <input type="name" class="form-control" name = "name" id="name">
                        </div>
                    </div>
                    <div class="col mx-1 my-1">
                        <div class="mb-3">
                            <label for="maxStudentNum" class="form-label">課程人數</label>
                            <input type="num" class="form-control" name = "maxStudentNum" id="maxStudentNum">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="mb3 mx-1 my-1">
                            <select class="form-select" aria-label="Default select example" name="credit">
                                <option selected>學分數</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb3 mx-1 my-1">
                            <select class="form-select" aria-label="Default select example" name="classRoom">
                                <option selected>教室</option>
                                <option value="501">501</option>
                                <option value="513">513</option>
                                <option value="601">601</option>
                                <option value="614">614</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3 mx-1 my-1">
                    <label for="exampleFormControlTextarea1" class="form-label">課程敘述</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="relate"></textarea>
                </div>

                <div class="row">
                    <div class="col-md col-4 d-flex align-items-center justify-content-center">
                        <button class="btn btn-secondary dropdown-toggle mx-1 my-1" href="#" role="button" id="Mon" data-bs-toggle="dropdown" aria-expanded="false">
                            星期一
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="Mon">
                            @for ($i = 1, $day = 'Mon'; $i < 9; $i++)
                                <li>
                                    <div class="dropdown-item">
                                        <input type="checkbox" value="Y" id="{{ $day }}_{{ $i }}" name="{{ $day }}_{{ $i }}">
                                        <label for="{{ $day }}_{{ $i }}">
                                            第{{ $i }}節
                                        </label>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    
                    <div class="col-md col-4 d-flex align-items-center justify-content-center">
                        <button class="btn btn-secondary dropdown-toggle mx-1 my-1" href="#" role="button" id="Tues" data-bs-toggle="dropdown" aria-expanded="false">
                            星期二
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="Tues">
                            @for ($i = 1, $day = 'Tues'; $i < 9; $i++)
                                <li>
                                    <div class="dropdown-item">
                                        <input type="checkbox" value="Y" id="{{ $day }}_{{ $i }}" name="{{ $day }}_{{ $i }}">
                                        <label for="{{ $day }}_{{ $i }}">
                                            第{{ $i }}節
                                        </label>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    
                    <div class="col-md col-4 d-flex align-items-center justify-content-center">
                        <button class="btn btn-secondary dropdown-toggle mx-1 my-1" href="#" role="button" id="Thrs" data-bs-toggle="dropdown" aria-expanded="false">
                            星期三
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="Thrs">
                            @for ($i = 1, $day = 'Thrs'; $i < 9; $i++)
                                <li>
                                    <div class="dropdown-item">
                                        <input type="checkbox" value="Y" id="{{ $day }}_{{ $i }}" name="{{ $day }}_{{ $i }}">
                                        <label for="{{ $day }}_{{ $i }}">
                                            第{{ $i }}節
                                        </label>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    
                    <div class="col-md col d-flex align-items-center justify-content-center">
                        <button class="btn btn-secondary dropdown-toggle mx-1 my-1" href="#" role="button" id="Wend" data-bs-toggle="dropdown" aria-expanded="false">
                            星期四
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="Wend">
                            @for ($i = 1, $day = 'Wend'; $i < 9; $i++)
                                <li>
                                    <div class="dropdown-item">
                                        <input type="checkbox" value="Y" id="{{ $day }}_{{ $i }}" name="{{ $day }}_{{ $i }}">
                                        <label for="{{ $day }}_{{ $i }}">
                                            第{{ $i }}節
                                        </label>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    
                    <div class="col-md col d-flex align-items-center justify-content-center">
                        <button class="btn btn-secondary dropdown-toggle mx-1 my-1" href="#" role="button" id="Fri" data-bs-toggle="dropdown" aria-expanded="false">
                            星期五
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="Fri">
                            @for ($i = 1, $day = 'Fri'; $i < 9; $i++)
                                <li>
                                    <div class="dropdown-item">
                                        <input type="checkbox" value="Y" id="{{ $day }}_{{ $i }}" name="{{ $day }}_{{ $i }}">
                                        <label for="{{ $day }}_{{ $i }}">
                                            第{{ $i }}節
                                        </label>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>

                <div class=" d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-primary mx-1 my-1">建立</button> 
                </div>
            </div>
            <div class="col-md col"></div>
        </div>
    </form>
</div>
@endsection