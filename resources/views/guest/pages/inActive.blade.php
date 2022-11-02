@extends('guest.layouts.app')

@section('content')
    {{-- Intro Section Start --}}
    @include('components.introSection')
    {{-- Intro Section End --}}

    <h1 class="text-center">
        <span class="text-danger">Inactive User</span> <br>
        <span class="text-warning">Akun Masih Belum Aktif Atau Di Nonaktifkan</span>
    </h1>
@endsection
