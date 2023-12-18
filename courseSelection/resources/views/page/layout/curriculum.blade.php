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
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @php($days = ['Mon', 'Tues', 'Thrs', 'Wend', 'Fri'])
            @for ($i = 1; $i <= 8; $i++)
                <tr>
                    <td scope="row">{{ $i }}</td>
                    @foreach ($days as $day)
                        @php($time = $day . '_' . $i)
                        <td>
                        @foreach ($results as $result)
                            @if ($result->time == $time)
                                <p>教室:{{ $result->classroom }}</p>
                                <p>課名:{{ $result->courseName }}</p>
                                <p>老師:{{ $result->teacherName }}</p>
                            @endif
                        @endforeach
                        </td>
                    @endforeach
                    <td>
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
                        </table>
                    </td> 
                </tr>
            @endfor
        </tbody>
    </table>
</div>
