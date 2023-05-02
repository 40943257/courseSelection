@extends('page.layout.master')

@section('content')
    <form action="{{ route('user.login') }}" method="POST">
        {{ csrf_field() }}
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                    <br>
                @endforeach
            </div>
        @endif
        <div>
            <label for="account">帳號</label><br>
            <input type="text" name="account" id="account">
        </div>
        <div>
            <label for="password">密碼</label><br>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" name="登入">
    </form>
@endsection