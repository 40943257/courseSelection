@extends('page.layout.master')

@section('title', '課程管理')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                <p>倒數時間:1000</p>
                <p>111學年度上學期</p>
                <p>{{ auth()->user()->name }}</p>
            </div>
            <div class="col">
                <div>
                    功能管理
                    <button class="btn bg-secondary btn-outline-dark bg-opacity-50 mx-1 my-1">課程管理</button>
                    <button class="btn bg-secondary btn-outline-dark bg-opacity-50 mx-1 my-1">課程核心</button>
                    <button class="btn bg-secondary btn-outline-dark bg-opacity-50 mx-1 my-1">SDGs</button>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">學年度/學期</div>
                    <div class="col border border-dark mx-1">112/上</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">課程代號</div>
                    <div class="col border border-dark mx-1">{{ $result->id }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">課名</div>
                    <div class="col border border-dark mx-1">{{ $result->courseName }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">老師名</div>
                    <div class="col border border-dark mx-1">{{ $result->teacherName }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">學分</div>
                    <div class="col border border-dark mx-1">{{ $result->credit }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">含實作課程</div>
                    <div class="col border border-dark mx-1">
                        <input class="form-check-input" type="checkbox" value="" id="" disabled>
                    </div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">課程內容是否包為智慧財產權相關概念、法規制度等
                        <br>
                        (打勾表示「否」)
                    </div>
                    <div class="col border border-dark mx-1 d-flex align-items-center mx-1">
                        <input class="form-check-input" type="checkbox" value="" id="" disabled>
                    </div>
                </div>
                <div class="row my-1">
                    <div class="col bg-primary text-light text-center mx-1">課程之專業構成要素(總百分比為100%)</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">數學</div>
                    <div class="col border border-dark mx-1">{{ $result->math }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">基礎科學</div>
                    <div class="col border border-dark mx-1">{{ $result->science }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">工程理論</div>
                    <div class="col border border-dark mx-1">{{ $result->engineeringTheory }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">工程設計</div>
                    <div class="col border border-dark mx-1">{{ $result->engineeringDesign }}</div>
                </div>
                <div class="row my-1">
                    <div class="col-2 bg-primary text-light text-center mx-1">通識教育</div>
                    <div class="col border border-dark mx-1">{{ $result->generalEducation }}</div>
                </div>
                <button class="btn bg-secondary btn-outline-dark bg-opacity-50 mx-1 my-1">編輯</button>
            </div>
        </div>
    </div>
@endsection
