@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center my-5">
                    <h1 class="fw-bold">Login</h1>
                </div>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email"
                                       class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email', '') }}"
                                       required autocomplete="email" autofocus>
                                <div class="invalid-feedback" role="alert">
                                    @error('email') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password"
                                       class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">
                                <div class="invalid-feedback" role="alert">
                                    @error('password') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Don't have an account? <a href="{{ route('register') }}" class="text-dark">Register now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
