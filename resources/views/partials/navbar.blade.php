<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
        {{-- Nav Heading --}}
        <a class="navbar-brand mb-0 h1" href="{{ route('home') }}">Shoes Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Nav Content --}}
        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('about') ? 'active border-bottom border-2 border-danger' : '' }}" href="{{ route('about') }}">{{ __('About Us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('shoes') ? 'active border-bottom border-2 border-danger' : '' }}" href="{{ route('shoes') }}">{{ __('Shoes') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" role="button">
                            <strong>{{ auth()->user()->name }}</strong>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow">
                            <li>
                                <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
                                    <span class="feather-sm" data-feather="settings"></span>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex gap-2 align-items-center">
                                        <span class="feather-sm text-danger" data-feather="log-out"></span>
                                        Sign out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-outline-light" type="button" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
