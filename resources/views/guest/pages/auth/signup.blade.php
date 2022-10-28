@extends('guest.layouts.app')

@section('content')
{{-- loginform --}}
<div class="row justify-content-center">

    <div class="col-lg-5 px-3">
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

        <main class="form-signin mt-4 py-3">
            <div class="container border border-danger rounded">
                <div class="text-center">
                    <img src="{{ asset('/img/logo.png') }}" alt="logo">
                </div>
                <h1 class="h3 mb-3 fw-normal text-center text-danger">Sign Up</h1>
                <form action="/signup" method="post" class="form-control-sm">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="text" name="name" class="form-control  @error ('name') is-invalid @enderror"
                            id="name" placeholder="name" autofocus required value="{{ old('name') }}">
                        <label for="name">Nama lengkap</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" name="email" class="form-control  @error ('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        <label for="email">E-mail</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                        <label for="password">Konfirmasi password</label>
                    </div>
                    <div class="mb-2">
                        {{-- <label for="selectRole" class="form-label">Pilih peran</label> --}}
                        <select name="selectRole" id="selectRole" class="form-select form-select-sm"
                            style="height: 50px">
                            <option>Pilih peran</option>
                            <option value="staff">Staff</option>
                            <option value="pemilikVilla">Pemilik Villa</option>
                        </select>
                    </div>
                    <div class="row g-2 mb-4">
                        <div class="col-sm-7">
                            <small class="d-block text-start">Sudah punya akun? <a href="#"
                                    class="text-decoration-none text-danger">Sign In</a>
                            </small>
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-danger mb-5" type="submit">Login</button>
                </form>

        </main>

    </div>
</div>
</div>
@endsection