@extends('page.layout.master')

@section('title', 'courseSelect')

@section('content')
    <div class="container my-1">
        @php($num = 0)
        <div class="table-responsive">
            <table class="table table-bordered my-1 text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">課名</th>
                        <th scope="col">老師名</th>
                        <th scope="col">學分</th>
                        <th scope="col">教室</th>
                        <th scope="col">時間</th>
                    </tr>
                </thead>
                <tbody>
                    @php($num = 0)
                    @foreach ($results as $result)
                        <tr>
                            <th>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $num }}">{{ $result->id }}</button>

                                <div class="modal fade" id="exampleModal{{ $num }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $result->courseName }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p>{{ $result->relate }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">關閉</button>
                                                <form action="{{ route('page.courseSelect') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="courseId" id="courseId" value="{{ $result->id }}">
                                                    <button type="submit" class="btn btn-primary">選擇</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th>{{ $result->courseName }}</th>
                            <th>{{ $result->teacherName }}</th>
                            <th>{{ $result->credit }}</th>
                            <th>{{ $result->classroom }}</th>
                            <th>{{ $result->times }}</th>
                        </tr>
                        @php($num++)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
