<aside class="">
    <div class="logo-section mt-5 mb-5">
        <a @if(Request::is('admin/main')) href="javascript:void(0)" @else href="{{ route('admin.main.index') }}" @endif>
        <img id="logo-section" src="{{ asset('logo.png') }}" class="img-fluid" alt="" sizes="(max-width: 710px) 120px,
            (max-width: 991px) 193px,
            278px" srcset="" height="124" width="124"></a>
    </div>
    <div class="side-nav-bar">
        <nav class="nav flex-column">
            <a class="nav-link {{ Request::is('admin/main') ? 'active' : '' }}" aria-current="page" @if(Request::is('admin/main')) href="javascript:void(0)" @else href="{{ route('admin.main.index') }}" @endif>Home</a>
            <a class="nav-link {{ Request::is('admin/events') ? 'active' : '' }}" @if(Request::is('admin/events')) href="javascript:void(0)" @else href="{{ route('admin.events.index') }}" @endif>Events</a>
            <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" @if(Request::is('admin/users')) href="javascript:void(0)" @else href="{{ route('admin.users.index') }}" @endif>Users</a>
            {{-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
        </nav>
    </div>
</aside>
