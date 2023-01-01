@extends('villa.layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/villa/style.css') }}">
@endsection

@section('content')
    <div class="container pt-3 pb-5">
        <div class="container mt-5">
            <div class="mt-2 mb-4">
                <h3>Manage Account and Request & Receive Staff</h3>
            </div>
            <div class="row justify-content-center mt-3 ">
                <div class="col-md-6 px-2">
                    <a href="{{ route('villa.lowongan') }}" class="text-decoration-none text-dark">
                        <div class="py-2 text-center bg-light rounded px-4 shadow border">
                            <h4>Requested Staff</h4>
                            <div
                                class="bg-warning bg-opacity-25 border border-warning py-2 row justify-content-center align-items-center">
                                <span class="text-center">You have requested <span
                                        class="text-success fw-bold">{{ $requestedStaff }}</span>
                                    staffs</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 px-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="py-2 text-center bg-light rounded px-4 shadow border">
                            <h4>Received Staff</h4>
                            <div
                                class="bg-success bg-opacity-25 border border-success py-2 row justify-content-center align-items-center">
                                <span class="text-center">You have received <span
                                        class="text-success fw-bold">{{ $receivedStaff }}</span> staffs
                                    request</span>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- <div class="col-md-4 text-center px-2">
                <div class="py-3 bg-light rounded px-4">
                    <h4>Account Management</h4>
                </div>
            </div> --}}
            </div>
            <div class="rounded border border-danger bg-white mt-3 p-3 shadow">
                <h4 class="text-center mb-3">Account Management</h4>

                <div class="row justify-content-evenly mb-5">
                    <div class="col-5 row justify-content-center">
                        {{-- unsplash --}}
                        <img src="{{ auth()->user()->image != 'default.png' ? asset('/storage/avatars/' . auth()->user()->image) : asset('/img/avatars/' . auth()->user()->image) }}"
                            class="img-fluid rounded-circle col-12 p-0" style="height:200px; width: 200px;" alt="">
                        <h5 class="text-center">Your Photo Porfile</h4>
                    </div>
                    <div class="col-5  row justify-content-center">
                        {{-- unsplash --}}
                        <img src="{{ auth()->user()->villa_image != 'default.png' ? asset('/storage/avatars/' . auth()->user()->villa_image) : asset('/img/villa/' . auth()->user()->villa_image) }}"
                            class="img-fluid rounded-circle col-12 p-0" style="height:200px; width: 200px;" alt="">
                        <h5 class="text-center">Your Villa Photo</h4>
                    </div>
                </div>

                {{-- Alert --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('villa.updateProfil') }}" method="POST" class="container"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ auth()->user()->name ? auth()->user()->name : old('name') }}">
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="villa_name" class="col-sm-2 col-form-label">Villa Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('villa_name') is-invalid @enderror"
                                name="villa_name" id="villa_name"
                                value="{{ auth()->user()->villa_name ? auth()->user()->villa_name : old('villa_name') }}">
                        </div>
                        @error('villa_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" id="username"
                                value="{{ auth()->user()->username ? auth()->user()->username : old('username') }}">
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ auth()->user()->email ? auth()->user()->email : old('email') }}">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                id="phone" value="{{ auth()->user()->phone ? auth()->user()->phone : old('phone') }}">
                        </div>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('salary') is-invalid @enderror"
                                name="salary" id="salary"
                                value="{{ auth()->user()->salary ? auth()->user()->salary : old('salary') }}">
                        </div>

                        @error('salary')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="bio" class="col-sm-2 col-form-label">Short text about your villa</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" id="bio" rows="3">{{ auth()->user()->bio ? auth()->user()->bio : old('bio') }}</textarea>
                        </div>
                        @error('bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="detailBio" class="col-sm-2 col-form-label">Detail information about your villa</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('detailBio') is-invalid @enderror" name="detailBio" id="detailBio"
                                rows="3">{{ auth()->user()->detailBio ? auth()->user()->detailBio : old('bio') }}</textarea>
                        </div>
                        @error('detailBio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3">{{ auth()->user()->address ? auth()->user()->address : old('address') }}</textarea>
                        </div>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('image') is-invalid @enderror" name="image"
                                type="file" id="image">
                        </div>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="image_villa" class="col-sm-2 col-form-label">Villa Image</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('image_villa') is-invalid @enderror" name="image_villa"
                                type="file" id="image_villa">
                        </div>
                        @error('image_villa')
                            <div class="invalid-feedback">
                                {{ $massage }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password">
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation">
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="float-end btn btn-danger" name="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Intro Section Start --}}
@endsection
