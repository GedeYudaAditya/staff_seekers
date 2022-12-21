@extends('staff.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mt-2">
            <h3>Find Your Job</h3>
        </div>
        <div class="row justify-content-center mt-3 ">
            @foreach ($villas as $villa)
                <div class="col-lg-4 px-3 py-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../img/villa1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="pages/description.blade.php" class="link-dark nounderline">
                                <h5 class="card-title">{{ $villa->name }}</h5>
                            </a>
                            <p class="card-text">
                                {{ $villa->bio }}
                            </p>
                            <p class="card-text fw-lighter">hiring: manager and poolman</p>

                            <a href="{{ route('staff.desc', $villa->username) }}" class="btn btn-primary">Apply</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
