@extends('villa.layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/villa/style.css') }}">
@endsection

@section('content')
    {{-- Intro Section Start --}}
    <div class="row justify-content-center">
        <div class="col-lg-4 px-3 py-3">
            <div class="text-center">
                <img src="{{ asset('/img/logo.png') }}" alt="staff-seekers">
                <h5 class="card-title">Staff Seekers</h5>
                <p class="card-text">Dashboard</p>
            </div>

            {{-- Image Villa --}}
            <div class="card mt-3">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ auth()->user()->villa_image != 'default.png' ? asset('/storage/villa/' . auth()->user()->villa_image) : asset('/img/villa/' . auth()->user()->villa_image) }}"
                            alt="villa" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
