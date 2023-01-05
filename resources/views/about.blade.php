@extends('guest.layouts.app')

@section('content')
    {{-- Intro Section Start --}}
    <div class="row justify-content-center mt-5 py-5">
        <div class="col-lg-4 px-3">
            <div class="text-center">
                <img src="{{ asset('/img/logo.png') }}" alt="staff-seekers">
                <h5 class="card-title">Staff Seekers</h5>
                <p class="card-text">Gede Yuda Aditya | Ni Wayan Anik Puspita Sari | Wahyu Singgih Wicaksono</p>
                @if (isset(auth()->user()->role) && auth()->user()->role == 'staff')
                    <a href="{{ route('staff.home') }}" class="btn btn-danger">Bring me home</a>
                @elseif(isset(auth()->user()->role) && auth()->user()->role == 'staff')
                    <a href="{{ route('villa.home') }}" class="btn btn-danger">Bring me home</a>
                @else
                    <a href="{{ route('home') }}" class="btn btn-danger">Bring me home</a>
                @endif
            </div>
        </div>
    </div>
@endsection
