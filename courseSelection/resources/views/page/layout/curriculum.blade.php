<div class="table-responsive">
    <table class="table table-bordered my-1 text-center align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">星期一</th>
                <th scope="col">星期二</th>
                <th scope="col">星期三</th>
                <th scope="col">星期四</th>
                <th scope="col">星期五</th>
            </tr>
        </thead>
        <tbody>
            @php($days = ['Mon', 'Tues', 'Thrs', 'Wend', 'Fri'])
            @for ($i = 1; $i <= 8; $i++)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    @foreach ($days as $day)
                        @php($time = $day . '_' . $i)
                        <th>
                            @foreach ($results as $result)
                                @if ($result->time == $time)
                                    教室:{{ $result->classroom }}<br>
                                    課名:{{ $result->courseName }}<br>
                                    老師:{{ $result->teacherName }}
                                @endif
                            @endforeach
                        </th>
                    @endforeach
                </tr>
            @endfor
        </tbody>
    </table>
</div>
