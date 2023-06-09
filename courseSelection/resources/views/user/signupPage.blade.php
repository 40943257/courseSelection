@extends('page.layout.master')

@section('title', 'signup')

@section('content')
    <div class="container my-1">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form action="{{ route('user.signup') }}" method="POST">
                    {{ csrf_field() }}
                    @include('page.layout.error')
                    <div class="mb-3">
                        <label for="account" class="form-label">帳號</label>
                        <input type="account" class="form-control" name="account" id="account" placeholder="帳號">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">密碼</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="密碼">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">姓名</label>
                        <input type="name" class="form-control" name="name" id="name" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="permissions">
                            <option value="2">學生</option>
                            <option value="1">老師</option>
                        </select>
                    </div>
                    <div class=" d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary mx-1 my-1">建立帳號</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
@endsection
