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
    {{-- @foreach ($staffs as $staff) --}}
    <div class="col-md-4 mb-3">
        <a href="#">
            <div class="card mb-3">
                {{-- @if ($staff['foto'] != null) --}}
                {{-- <div style="max-height: 400px; overflow: hidden;">
                    <img src="{{ $staff['foto'] }}" class="card-img-top img-fluid" alt="{{ $guide->image }}">
                </div> --}}
                {{-- @else --}}
                <img src="https://reqres.in/img/faces/7-image.jpg" class="card-img-top img-fluid" alt="user-example">
                {{-- @endif --}}
        </a>
        <div class="card-body">
            <h5 class="card-title" style="text-decoration: none;">Nama</h5>
            <p class="card-text">Deskripsi</p>
        </div>
    </div>
</div>
{{-- @endforeach --}}
</div>
@endsection