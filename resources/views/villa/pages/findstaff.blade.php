@extends('villa.layouts.app')

@section('content')
    {{-- Intro Section Start --}}

    <div class="position-relative overflow-hidden p-3 p-md-5 text-center">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">Punny headline</h1>
            <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this
                example based on Apple’s marketing pages.</p>
            <a class="btn btn-outline-secondary" href="#list">Coming soon</a>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>


    <div class="container">
        <div class="row mt-4">
            {{-- TINGGAL AKTIFIN AJA KALO MAU DIPAKEK --}}
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 mx-0" id="list">
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
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div><i class="fas fa-solid fa-person-swimming fa-fw me-2"></i>Poolman</div>
                                <a href="{{ route('villa.find-staff.detail', $staff->username) }}"
                                    class="btn btn-danger">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
