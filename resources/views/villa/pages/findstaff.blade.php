@extends('staff.layouts.app')

@section('content')
    {{-- Intro Section Start --}}

    {{-- <div class="position-relative overflow-hidden p-3 p-md-5 text-center">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">Punny headline</h1>
            <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this
                example based on Apple’s marketing pages.</p>
            <a class="btn btn-outline-secondary" href="#list">Coming soon</a>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div> --}}


    {{-- <div class="row mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 mx-0">
            @foreach ($staffs as $staff)
                <div class="col">
                    <div class="card h-100">
                        @if ($staff['image'] != null)
                            <img style="height: 200px" src="{{ $staff['image'] }}" class="card-img-top img-fluid"
                                alt="{{ $staff->image }}">
                        @else
                            <img style="height: 200px" src="https://reqres.in/img/faces/7-image.jpg"
                                class="card-img-top img-fluid" alt="user-example">
                        @endif
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title" style="text-decoration: none;">Nama: {{ $staff->name }}</h5>
                                <p class="card-text"><b>Bio: </b> <br>
                                    {{ $staff->bio }}
                                </p>
                                <a href="{{ route('staff.find-staff.detail', $staff->username) }}"
                                    class="btn btn-danger">Details</a>
                            </div>
            @endforeach
        </div>
    </div> --}}
    <div class="container mt-5">
        <div class="mt-2">
            <h3>Find Your Job</h3>
            {{-- Search --}}
            <form action="{{ route('staff.find-job') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" name="search"
                                value="{{ request()->query('search') }}">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row justify-content-center mt-3 ">
            @forelse ($staffs as $staff)
                <div class="col-lg-4 px-3 py-3">
                    <div class="card h-100 overflow-hidden" style="width: 18rem;">
                        <div class="bg-success bg-opacity-75 py-2 px-3 position-absolute text-white fw-bold">Hearing!!</div>
                        <img src="{{ $staff->image ? asset('/storage/avatars/' . $staff->image) : asset('/img/villa1.jpg') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body position-relative">
                            <a href="{{ route('staff.desc', $staff->username) }}" class="text-primary text-decoration-none">
                                <h5 class="card-title">{{ $staff->name }}</h5>
                            </a>
                            {{-- <small class="fw-lighter mb-1">{{ $staff->name }}</small> --}}
                            <p class="text-muted small">{{ $staff->address }}</p>

                            <p class="card-text mb-5">
                                {{ $staff->bio }}
                            </p>

                            <small class="fw-bold position-absolute border-top" style="bottom: 10px;">
                                Salary : {{ $staff->salary }}
                            </small>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-9">
                                    {{-- <small class="card-text fw-lighter">hiring: manager and poolman</small> --}}
                                    <small class="text-muted">Updated at {{ $staff->updated_at->diffForHumans() }}</small>
                                </div>
                                <div class="col-md-3">
                                    {{-- {{ route('villa.desc', $staff->username) }} --}}
                                    <a href="" class="btn btn-sm btn-primary">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-info text-center">
                        <h5>Sorry, we can't found staff for search {{ request()->search }}</h5>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
