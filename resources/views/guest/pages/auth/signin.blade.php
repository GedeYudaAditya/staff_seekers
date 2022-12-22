@extends('guest.layouts.app')

@section('content')
    {{-- loginform --}}
    <div class="row justify-content-center">

        <div class="col-lg-4 px-3 mt-5 pt-5">
            {{-- alert login --}}
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin mt-1 py-3">
                <div class="container border border-danger rounded">
                    <div class="text-center">
                        <img src="{{ asset('/img/logo.png') }}" alt="logo">
                    </div>
                    <h1 class="h3 mb-3 fw-normal text-center text-danger">Sign In</h1>
                    <form action="{{ route('signin.proccess') }}" method="post" class="form-control-sm">
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                                id="email" placeholder="name@example.com" autofocus required
                                value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-7">
                                <small class="d-block text-start">Belum punya akun? <a href="{{ route('register') }}"
                                        class="text-decoration-none text-danger">Sign Up</a>
                                </small>
                            </div>
                            <div class="col">
                                <small class="d-block text-end"><a href="#"
                                        class="text-decoration-none text-danger">Lupa
                                        password?</a>
                                </small>
                            </div>
                        </div>
                        <button class="w-100 btn btn-lg btn-danger mb-5" type="submit">Login</button>
                    </form>

            </main>

        </div>
    </div>
@endsection
