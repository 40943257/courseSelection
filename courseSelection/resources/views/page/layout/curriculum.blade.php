<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Mon</th>
        <th scope="col">Tues</th>
        <th scope="col">Thrs</th>
        <th scope="col">Wend</th>
        <th scope="col">Fri</th>
      </tr>
    </thead>
    <tbody>
      @php ($days = ['Mon', 'Tues', 'Thrs', 'Wend', 'Fri'])
        @for($i = 1; $i <= 8; $i++)
            <tr>
              <th scope="row">{{ $i }}</th>
              @foreach($days as $day)
                @php ($time = $day . '_' . $i)
                <th>
                  @if(in_array($time, $times))
                    Y
                  @endif
                </th>
              @endforeach
            </tr>
        @endfor
    </tbody>
  </table>