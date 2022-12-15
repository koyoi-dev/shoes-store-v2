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
                    <a class="nav-link {{ Route::is('about') ? 'active border-bottom border-2 border-danger' : '' }}"
                       href="{{ route('about') }}">{{ __('About Us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('shoes') ? 'active border-bottom border-2 border-danger' : '' }}"
                       href="{{ route('shoes') }}">{{ __('Shoes') }}</a>
                </li>
            </ul>
            <div class="d-flex mt-3 mt-md-0 me-0 me-sm-2">
                <form class="input-group input-group-sm" action="{{ route('shoes') }}" method="GET">
                    <input type="search" class="form-control" placeholder="Nike Air Max" name="keyword"
                           value="{{ request('keyword', '') }}">
                    <button class="btn btn-danger" type="submit">
                        Search
                    </button>
                </form>
            </div>
            <ul class="navbar-nav mt-3 mt-md-0 gap-2">
                @auth
                    <li class="nav-item">
                        <a class="btn btn-sm btn-outline-light fw-bold position-relative" type="button" href="{{ route('cart') }}">
                            <i class="bi bi-cart me-1"></i> <span class="badge text-bg-danger">{{ auth()->user()->cart->items_count }}</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" role="button">
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
                        <a class="btn btn-sm btn-outline-light" type="button" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
