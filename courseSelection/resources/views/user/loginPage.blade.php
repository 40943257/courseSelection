@extends('page.layout.master')

@section('title', 'login')

@section('content')
    <div class="container my-1">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form action="{{ route('user.login') }}" method="POST">
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
                    <div class=" d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary mx-1 my-1">登入</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
@endsection
