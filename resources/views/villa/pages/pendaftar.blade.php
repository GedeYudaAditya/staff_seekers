@extends('villa.layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/villa/style.css') }}">
@endsection

@section('content')
    <div class="container py-5 h-100">
        <h1>List Pendaftar</h1>

        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table_id2" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Pengaju</th>
                                    <th>Alamat</th>
                                    {{-- <th>CV</th> --}}
                                    {{-- <th>Salary</th> --}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $job->user->name }}</td>
                                        <td>{{ $job->user->address }}</td>
                                        {{-- <td>{{ $job->user->cv }}</td> --}}
                                        {{-- <td>{{ $job->villa->salary }}</td> --}}
                                        <td>
                                            @if ($job->status == 'pending')
                                                <span class="badge bg-secondary py-2">Pending</span>
                                            @elseif($job->status == 'accepted')
                                                <span class="badge bg-success py-2">Accepted</span>
                                            @else
                                                <span class="badge bg-danger py-2">Rejected</span>
                                            @endif
                                        </td>
                                        <td class="row">
                                            {{-- {{ route('staff.jobdetail', $job->id) }}
                                            {{ route('staff.jobcancle', $job->id) }} --}}
                                            <form action="{{ route('villa.kelolaPendaftar', $job->user->username) }}"
                                                onsubmit="return confirm('Yakin untuk melakukan aksi ini untuk lamaran staff {{ $job->user->name }}?')"
                                                method="post">
                                                @csrf
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <button type="button" class="btn btn-sm btn-primary col-md-4"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $job->user->id }}"><i
                                                            class="fa fa-info" aria-hidden="true"></i></button>
                                                    @if ($job->status == 'pending')
                                                        <button type="submit"
                                                            onclick="requested('Yakin untuk menerima lamaran staff ini?')"
                                                            value="ya" name="terima"
                                                            class="btn btn-sm btn-success col-md-4"><i class="fa fa-plus"
                                                                aria-hidden="true"></i></button>
                                                        <button type="submit"
                                                            onclick="requested('Prosess ini tidak dapet dikembalikan lagi. Yakin untuk menolak lamaran staff ini? ')"
                                                            value="tidak" name="terima"
                                                            class="btn btn-sm btn-danger col-md-4"><i class="fa fa-minus"
                                                                aria-hidden="true"></i></button>
                                                    @elseif ($job->status == 'accepted')
                                                        <button disabled class="btn btn-sm btn-outline-success col-md-4"><i
                                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                                        <button
                                                            onclick="requested('Yakin untuk mengembalikan staff ini ke pending?')"
                                                            type="submit" value="pending" name="terima"
                                                            class="btn btn-sm btn-secondary col-md-4"><i class="fa fa-undo"
                                                                aria-hidden="true"></i></button>
                                                    @else
                                                        <button disabled class="btn btn-sm btn-outline-success col-md-4"><i
                                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                                        <button disabled
                                                            class="btn btn-sm btn-outline-secondary col-md-4"><i
                                                                class="fa fa-minus" aria-hidden="true"></i></button>
                                                    @endif
                                                </div>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $job->user->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Staff</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="card mb-3" style="width: 100%">
                                                            <div class="row g-0">
                                                                <div class="col-md-4">
                                                                    <img src="{{ $job->user->image != 'default.png' ? asset('/storage/avatars/' . $job->user->image) : asset('/img/avatars/' . $job->user->image) }}"
                                                                        class="img-fluid rounded-start h-100"
                                                                        alt="{{ $job->user->name }}">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h3 class="card-title fw-bold">
                                                                            {{ $job->user->name }}
                                                                        </h3>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12">
                                                                                <div class="fs-small text-md-start">
                                                                                    <i class="fa fa-envelope"
                                                                                        aria-hidden="true"></i>
                                                                                    Email : {{ $job->user->email }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="fs-small text-md-start">
                                                                                    <i class="fa fa-phone"
                                                                                        aria-hidden="true"></i>
                                                                                    Phone : {{ $job->user->phone }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="fs-small">
                                                                                    <i class="fa fa-map"
                                                                                        aria-hidden="true"></i>
                                                                                    Adderss : {{ $job->user->address }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="fw-bold">
                                                                                    <i class="fa fa-money"
                                                                                        aria-hidden="true"></i>
                                                                                    Salary : {{ $job->user->salary }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="card-text">
                                                                            {{ $job->user->bio }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <h4>Description</h4>
                                                            <p>
                                                                {{ $job->user->detailBio }}
                                                            </p>
                                                            <hr>
                                                            <h4>Skills</h4>
                                                            <ul>
                                                                <li>Skill 1</li>
                                                                <li>Skill 2</li>
                                                                <li>Skill 3</li>
                                                            </ul>
                                                            <hr>
                                                            <form
                                                                action="{{ route('villa.cvStaff', $job->user->username) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="text-center">
                                                                    <button type="submit" href=""
                                                                        class="btn btn-primary">Download CV</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_id2').DataTable();
        });
    </script>
    {{-- Intro Section Start --}}
@endsection
