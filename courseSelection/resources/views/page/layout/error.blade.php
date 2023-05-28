@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <div class="mb-3 text-danger text-center h2">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif
