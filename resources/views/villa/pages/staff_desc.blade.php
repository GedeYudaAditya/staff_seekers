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
                    <h6>Skill</h6>
                    {{-- card text --}}
                    <div class="card-text">
                        <div class="row justify-content-center mx-3">
                            @forelse ($skills as $skill)
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $skill->title }}
                                            </h5>
                                            {{-- <p class="card-text">
                                                {{ $skill->pivot->description }}
                                            </p> --}}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                No Skill
                                            </h5>
                                            {{-- <p class="card-text">
                                                {{ $skill->pivot->description }}
                                            </p> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforelse
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
                    <div class="button row py-5 jsutify-content-center">
                        <form action="{{ route('villa.requestStaff', $staff->username) }}" method="post">
                            {{-- notif --}}
                            @if (session('success'))
                                <div class="alert alert-success col-6">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger col-6">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @csrf
                            @if ($staffRequest == 'null')
                                <button type="submit" class="btn btn-danger col-md-3">Hire Staff</button>
                            @else
                                @if ($staffRequest == 'rejected')
                                    <button type="submit" class="btn btn-danger col-md-3">Hire Staff</button>
                                @else
                                    <button type="submit" class="btn btn-danger col-md-3" disabled>Hire Staff</button>
                                @endif
                            @endif
                            <a target="blank"
                                href="https://wa.me/{{ $staff->phone }}?text=Halo%20{{ $staff->name }},%20Saya%20{{ auth()->user()->name }}%20ingin%20menawarkan%20pekerjaan%20untuk%20villa%20{{ auth()->user()->villa_name }}"
                                class="btn btn-success col-md-3">Hubungi</a>

                            {{-- Modal Lapor Button --}}
                            <button type="button" class="btn btn-warning col-md-3" data-bs-toggle="modal"
                                data-bs-target="#reportModal">
                                Lapor
                            </button>
                        </form>
                    </div>
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
    {{-- Report Modal --}}
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Lapor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('report', $staff->username) }}" method="post">
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
