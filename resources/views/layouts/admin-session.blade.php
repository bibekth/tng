<aside>
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            @if(is_array(Session::get('error')))
            @foreach (Session::get('error')->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            @else
            <li>{{ Session::get('error') }}</li>
            @endif
        </ul>
    </div>
    @endif
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}

</aside>
