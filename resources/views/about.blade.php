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

    {{-- Lapor Bug Modal Button --}}
    <div class="row justify-content-center">
        <div class="col-lg-4">
            @if (session('success'))
                <div class="alert alert-success my-3">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger my-3">
                    {{ session('error') }}
                </div>
            @endif
            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#laporBugModal">
                Lapor Bug
            </button>
        </div>
    </div>

    {{-- Lapor Bug Modal --}}
    <div class="modal fade" id="laporBugModal" tabindex="-1" aria-labelledby="laporBugModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="laporBugModalLabel">Lapor Bug</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reportBug') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="name" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="report" class="form-label">Laporan Bug</label>
                            <textarea class="form-control" id="report" name="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Lapor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
