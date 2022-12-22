@extends('staff.layouts.app')

@section('content')
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
            @forelse ($villas as $villa)
                <div class="col-lg-4 px-3 py-3">
                    <div class="card h-100 overflow-hidden" style="width: 18rem;">
                        <div class="bg-success bg-opacity-75 py-2 px-3 position-absolute text-white fw-bold">Hearing!!</div>
                        <img src="{{ $villa->image_villa ? asset('/storage/villa/' . $villa->image_villa) : asset('/img/villa1.jpg') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body position-relative">
                            <a href="{{ route('staff.desc', $villa->username) }}" class="text-primary text-decoration-none">
                                <h5 class="card-title">{{ $villa->name }}</h5>
                            </a>
                            <small class="fw-lighter mb-1">{{ $villa->name_villa }}</small>
                            <p class="text-muted small">{{ $villa->address }}</p>

                            <p class="card-text mb-5">
                                {{ $villa->bio }}
                            </p>

                            <small class="fw-bold position-absolute border-top" style="bottom: 10px;">
                                Salary : {{ $villa->salary }}
                            </small>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-9">
                                    {{-- <small class="card-text fw-lighter">hiring: manager and poolman</small> --}}
                                    <small class="text-muted">Updated at {{ $villa->updated_at->diffForHumans() }}</small>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('staff.desc', $villa->username) }}"
                                        class="btn btn-sm btn-primary">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-info text-center">
                        <h5>Sorry, we can't found villa for search {{ request()->search }}</h5>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
