@extends('staff.layouts.app')

@section('content')
    <div class="container">
        <div class="description w-100 text-center">
            <div class="header mt-5">
                <h1>{{ $villa->name }}</h1>
            </div>
            <div class="card w-100 overflow-hidden">
                <div class="card w-100 mb-3">
                    <div class="bg-secondary" style="height: 300px">
                        <img src="{{ $villa->villa_image != 'default.png' ? asset('/storage/villa/' . $villa->villa_image) : asset('/img/villa/' . $villa->villa_image) }}"
                            class="img-fluid" alt="" style="height: 100%">
                    </div>
                </div>
                <h5>{{ $villa->villa_name }}</h5>
                <div class="info mt-2 ">
                    <div>{{ $villa->address }}</div>
                    <div class="mt-0">email: {{ $villa->email }}</div>
                    <div class="mt-0">phone: {{ $villa->phone }}</div>
                </div>
                <div class="mt-5">
                    <h4>About Us</h4>
                </div>
                <div class="desc">
                    <p>
                        {{ $villa->detailBio }}
                    </p>
                </div>
                <div>
                    <h4 class="text-center">Salary</h4>
                </div>
                <div class="text-center">
                    <p>{{ $villa->salary }}</p>
                </div>
                {{-- <div class="col-lg-3 py-2 text-center w-100">
                    <h6>Hire</h6>
                    <div class="container d-flex justify-content-evenly">
                        <div>
                            <i class="fas fa-user-tie fa-fw me-4"></i>Manager</li>
                        </div>
                        <div>
                            <i class="fas fa-solid fa-person-swimming fa-fw me-4"></i>Poolman</li>
                        </div>
                    </div>
                </div> --}}
                <h4>Required</h4>
                <div class="row justify-content-center">
                    @forelse ($villaRequire as $require)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ $require->thumbnail != 'default.png' ? asset('/storage/announcements/' . $require->thumbnail) : asset('/img/villa/' . $require->thumbnail) }}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $require->title }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Sedang Tidak Mencari Staff</p>
                    @endforelse
                </div>

                {{-- <div class="col-lg-4 py-2 text-center w-100">
                    <h6>Require</h6>
                    <div class="container d-flex justify-content-evenly">
                        <div>
                            <i class="fas fa-solid fa-language me-4"></i>Speak English</li>
                        </div>
                        <div>
                            <i class="fas fa-solid fa-briefcase fa-fw me-4"></i>2 years of experience</li>
                        </div>
                    </div>
                </div> --}}
                <div class="button d-grid py-5">
                    <form action="{{ route('staff.requestJob', $villa->username) }}" method="post">
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
                        @if ($userRequest == 'null')
                            <button type="submit" class="btn btn-danger">Request Job</button>
                        @else
                            @if ($userRequest == 'rejected')
                                <button type="submit" class="btn btn-danger">Request Job</button>
                            @else
                                <button type="submit" class="btn btn-danger" disabled>Request Job</button>
                            @endif
                        @endif
                        <a target="blank"
                            href="https://wa.me/{{ $villa->phone }}?text=Halo%20{{ $villa->name }},%20Saya%20{{ auth()->user()->name }}%20ingin%20melamar%20pekerjaan%20anda%20untuk%20villa%20{{ $villa->villa_name }}"
                            class="btn btn-success">Hubungi</a>

                        {{-- Modal Lapor Button --}}
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#reportModal">
                            Lapor
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Report Modal --}}
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Lapor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('report', $villa->username) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="name" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="report" class="form-label">Laporan</label>
                            <textarea class="form-control" id="report" name="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
