@extends('guest.layouts.app')

@section('content')
    {{-- Intro Section Start --}}
    <div class="container mt-5">
        @include('components.introSection')
    </div>
    {{-- Intro Section End --}}

    <section class="mx-4">
        <h1 class="text-center">
            <span class="text-danger">Inactive User</span> <br>
            <span class="text-warning">Akun Masih Belum Aktif Atau Di Nonaktifkan</span>
        </h1>
    </section>
@endsection
