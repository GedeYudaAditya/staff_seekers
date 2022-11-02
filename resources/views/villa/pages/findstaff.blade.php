@extends('villa.layouts.app')

@section('content')
    {{-- Intro Section Start --}}
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4 px-3">
            <div class="text-center">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-danger">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        {{-- TINGGAL AKTIFIN AJA KALO MAU DIPAKEK --}}
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
