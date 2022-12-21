@extends('staff.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mt-2 mb-4">
            <h3>Manage Account and Request & Receive Jobs</h3>
        </div>
        <div class="row justify-content-center mt-3 ">
            <div class="col-md-6 px-2">
                <div class="py-3 text-center bg-light rounded px-4 shadow">
                    <h4>Requested Job Status</h4>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="py-3 text-center bg-light rounded px-4 shadow">
                    <h4>Received Job</h4>
                </div>
            </div>
            {{-- <div class="col-md-4 text-center px-2">
                <div class="py-3 bg-light rounded px-4">
                    <h4>Account Management</h4>
                </div>
            </div> --}}
        </div>
        <div class="rounded border border-danger bg-white mt-3 p-3 shadow">
            <h4 class="text-center mb-3">Account Management</h4>

            <div class="row justify-content-center mb-5">
                {{-- unsplash --}}
                <img src="{{ auth()->user()->image ? auth()->user()->image : 'https://images.unsplash.com/person' }}"
                    class="img-fluid rounded-circle col-12 p-0" style="height:200px; width: 200px;" alt="">
            </div>

            <form action="{{ route('staff.updateProfil') }}" method="POST" class="container">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" value="{{ auth()->user()->username }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" value="{{ auth()->user()->phone }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="salary" value="{{ auth()->user()->salary }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="bio" rows="3">{{ auth()->user()->bio }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="detailBio" class="col-sm-2 col-form-label">Detail Bio</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="detailBio" rows="3">{{ auth()->user()->detailBio }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="address" rows="3">{{ auth()->user()->address }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="cv" class="col-sm-2 col-form-label">CV</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="cv">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirmPassword">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="float-end btn btn-danger">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
