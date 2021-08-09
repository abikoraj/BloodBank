{{-- <div class="d-flex align-items-center align-items-sm-start px-2 pt-3 text-white" id="side-bar">
    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none flex-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#8a0303" class="bi bi-droplet-fill me-2"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" />
        </svg>
        <span class="fs-4 d-none d-sm-inline">Blood Bank</span>
    </a>
    <hr class="w-100 my-0" style="height: 2px;">
    <ul class="nav nav-pills mb-auto w-100 ">

        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link text-white {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}"
                class="nav-link text-white {{ Route::is('admin.users') ? 'active' : '' }}">
                <i class="bi bi-people"></i> <span class="ms-1 d-none d-sm-inline">Users</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.requests') }}"
                class="nav-link text-white {{ Route::is('admin.requests') ? 'active' : '' }}">
                <i class="bi bi-clipboard-plus"></i> <span class="ms-1 d-none d-sm-inline">Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('cities') }}" class="nav-link text-white {{ Route::is('cities') ? 'active' : '' }}">
                <i class="bi bi-building"></i> <span class="ms-1 d-none d-sm-inline">Cities</span>
            </a>
        </li>
        <li>
            <a href="{{ route('sliders.index') }}"
                class="nav-link text-white {{ Route::is('sliders.index') ? 'active' : '' }}">
                <i class="bi bi-building"></i> <span class="ms-1 d-none d-sm-inline">Sliders</span>
            </a>
        </li>
    </ul>
    <hr class="w-100" style="height: 2px;">
    @php
        $profile = Auth::user();
    @endphp
    <div class="dropdown pb-3">
        <button class="btn btn-link text-decoration-none dropdown-toggle text-white" type="button"
            id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            @if ($profile->image == null)
                <img src="{{ asset('assets/images/profile_dummy.png') }}" alt="Admin" width="24" height="24"
                    class=" rounded-circle me-2">
            @else
                <img src="{{ asset($profile->image) }}" alt="" width="24" height="24" class="rounded-circle me-2">
            @endif
            <span class="d-none d-sm-inline mx-1">{{ $profile->name }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
            <li><a class="dropdown-item active" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Sign Out</a></li>
        </ul>
    </div>
</div> --}}
