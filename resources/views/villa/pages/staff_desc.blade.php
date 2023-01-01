@extends('villa.layouts.app')

@section('content')
    <div class="container">
        <div class="description w-100 text-center py-3">
            <div class="mt-5">
                <h5>{{ $staff->name }}</h5>
                <div class="info mt-2 ">
                    <div>{{ $staff->address }}</div>
                    <div class="mt-0">email: {{ $staff->email }}</div>
                </div>
                <div class="card w-100">
                    <div class="bg-secondary overflow-hidden" style="height: 300px">
                        <img src="{{ $staff->image != 'default.png' ? asset('/storage/avatars/' . $staff->image) : asset('/img/avatars/' . $staff->image) }}"
                            class="" alt="" style="height: 100%">
                    </div>

                    <div class="mt-5">
                        <h6>About Us</h6>
                    </div>
                    <div class="desc">
                        <p>
                            {{ $staff->detailBio }}
                        </p>
                    </div>
                    <div>
                        <h6 class="text-center">Salary</h6>
                    </div>
                    <div class="text-center">
                        <p>{{ $staff->salary }}</p>
                    </div>
                    <div class="col-lg-3 py-2 text-center w-100">
                        <h6>Preferred job</h6>
                        <div class="container d-flex justify-content-evenly">
                            <div>
                                <i class="fas fa-user-tie fa-fw me-4"></i>Manager</li>
                            </div>
                            <div>
                                <i class="fas fa-solid fa-person-swimming fa-fw me-4"></i>Poolman</li>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6>Menu</h6>
                    </div>
                    <div class="desc">
                        <form action="{{ route('villa.cvStaff', $staff->username) }}" method="post">
                            @csrf
                            <div class="text-center">
                                <button type="submit" href="" class="btn btn-primary">Download CV</button>
                            </div>
                        </form>
                        {{-- <a href="#">
                        <p><i class="fas fa-solid fa-person-swimming fa-fw me-2"></i>Curriculum vitae</p>
                    </a> --}}
                    </div>
                    <div class="button d-grid py-5">
                        <form action="{{ route('villa.requestStaff', $staff->username) }}" method="post">
                            {{-- notif --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @csrf
                            @if ($staffRequest == 'null')
                                <button type="submit" class="btn btn-danger">Hire Staff</button>
                            @else
                                @if ($staffRequest == 'rejected')
                                    <button type="submit" class="btn btn-danger">Hire Staff</button>
                                @else
                                    <button type="submit" class="btn btn-danger" disabled>Hire Staff</button>
                                @endif
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container mt-5">
        <div class="description w-100 text-center">
            <div class="mt-5">
                <h5>{{ $staff->staff_name }}</h5>
                <div class="info mt-2 ">
                    <div>{{ $staff->address }}</div>
                    <div class="mt-0">email: {{ $staff->email }}</div>
                </div>
                <div class="card w-100">
                    <img src="{{ $staff->image ? asset('/storage/villa/' . $staff->image) : asset('/img/villa1.jpg') }}"
                        class="h-75" alt="">
                </div>
            </div>
            <div class="card px-2 w-100">
                <img style="height: 200px" src="https://via.placeholder.com/640x480.png/00aa77?text=voluptatum"
                    class="card-img-top img-fluid mt-2" alt="img">
                <div class="mt-5">
                    <h5>{{ $staff->name }}</h5>
                </div>
                <div class="mt-3">
                    <h6>Preferred job</h6>
                </div>
                <div class="desc">
                    <p><i class="fas fa-solid fa-person-swimming fa-fw me-2"></i>Poolman</p>
                    <p><i class="fas fa-solid fa-person-swimming fa-fw me-2"></i>Poolman</p>
                </div>
                <div class="mt-3">
                    <h6>About Me</h6>
                </div>
                <div class="desc">
                    <p>{{ $staff->detailBio }}
                    </p>
                </div>

                <div class="mt-3">
                    <h6>Menu</h6>
                </div>
                <div class="desc">
                    <a href="#">
                        <p><i class="fas fa-solid fa-person-swimming fa-fw me-2"></i>Curriculum vitae</p>
                    </a>
                </div>
                <div class="button d-grid py-5">
                    <input class="btn btn-danger mb-2" type="button" value="Recruit">
                </div>
            </div>
        </div>
    </div> --}}
    @endsection
