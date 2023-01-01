@extends('staff.layouts.app')

@section('content')
    <div class="container">
        <div class="description w-100 text-center">
            <div class="header mt-5">
                <h5>{{ $villa->villa_name }}</h5>
                <div class="info mt-2 ">
                    <div>{{ $villa->address }}</div>
                    <div class="mt-0">email: {{ $villa->email }}</div>
                </div>
                <div class="card w-100">
                    <img src="{{ $villa->villa_image != 'default.png' ? asset('/storage/avatars/' . $villa->villa_image) : asset('/img/villa/' . $villa->villa_image) }}"
                        class="h-75" alt="">
                </div>

            </div>
            <div class="card px-2 w-100">

                <div class="mt-5">
                    <h6>About Us</h6>
                </div>
                <div class="desc">
                    <p>
                        {{ $villa->detailBio }}
                    </p>
                </div>
                <div>
                    <h6 class="text-center">Salary</h6>
                </div>
                <div class="text-center">
                    <p>{{ $villa->salary }}</p>
                </div>
                <div class="col-lg-3 py-2 text-center w-100">
                    <h6>Hire</h6>
                    <div class="container d-flex justify-content-evenly">
                        <div>
                            <i class="fas fa-user-tie fa-fw me-4"></i>Manager</li>
                        </div>
                        <div>
                            <i class="fas fa-solid fa-person-swimming fa-fw me-4"></i>Poolman</li>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-2 text-center w-100">
                    <h6>Require</h6>
                    <div class="container d-flex justify-content-evenly">
                        <div>
                            <i class="fas fa-solid fa-language me-4"></i>Speak English</li>
                        </div>
                        <div>
                            <i class="fas fa-solid fa-briefcase fa-fw me-4"></i>2 years of experience</li>
                        </div>
                    </div>
                </div>
                <div class="button d-grid py-5">
                    <form action="{{ route('staff.requestJob', $villa->username) }}" method="post">
                        {{-- notif --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @csrf
                        @if ($userRequest == 'null')
                            <button type="submit" class="btn btn-danger">Request Job</button>
                        @else
                            @if ($userRequest == 'rejected')
                                <button type="submit" class="btn btn-danger">Request Job</button>
                            @else
                                <button type="submit" class="btn btn-danger" disabled>Request Job</button>
                            @endif
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
