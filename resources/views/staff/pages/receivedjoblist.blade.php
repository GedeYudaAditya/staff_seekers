@extends('staff.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mt-2 mb-4">
            <h3>Received Jobs List</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table_id" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Villa</th>
                                        <th>Owner</th>
                                        <th>Location</th>
                                        {{-- <th>Salary</th> --}}
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ $job->user->villa_name }}</td>
                                            <td>{{ $job->user->name }}</td>
                                            <td>{{ $job->user->address }}</td>
                                            {{-- <td>{{ $job->user->salary }}</td> --}}
                                            <td>
                                                @if ($job->status == 'pending')
                                                    <span class="badge bg-secondary py-2">Pending</span>
                                                @elseif($job->status == 'accepted')
                                                    <span class="badge bg-success py-2">Accepted</span>
                                                @else
                                                    <span class="badge bg-danger py-2">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- {{ route('villa.jobdetail', $job->id) }}
                                                {{ route('villa.jobcancle', $job->id) }} --}}
                                                @if ($job->status == 'pending')
                                                    <form class="row"
                                                        action="{{ route('staff.acceptReceivedJob', $job->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $job->id }}"
                                                            class="btn btn-sm btn-primary"><i class="fa fa-info"
                                                                aria-hidden="true"></i></button>
                                                        <button type="submit" class="btn btn-sm btn-success"><i
                                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                                    </form>
                                                    <form class="row"
                                                        action="{{ route('staff.declineReceivedJob', $job->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="fa fa-minus" aria-hidden="true"></i></button>
                                                    </form>
                                                @else
                                                    <div class="row">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $job->id }}"
                                                            class="btn btn-sm btn-primary"><i class="fa fa-info"
                                                                aria-hidden="true"></i></button>
                                                        <button disabled class="btn btn-sm btn-success"><i
                                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                                        <button disabled class="btn btn-sm btn-secondary"><i
                                                                class="fa fa-minus" aria-hidden="true"></i></button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- modal --}}
                                        <div class="modal fade" id="exampleModal{{ $job->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Requested
                                                            Job</h1>
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
                                                                                        Adderss :
                                                                                        {{ $job->user->address }}
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
                                                                <h4>Requirment</h4>
                                                                <ul>
                                                                    <li>Skill 1</li>
                                                                    <li>Skill 2</li>
                                                                    <li>Skill 3</li>
                                                                </ul>
                                                                <hr>
                                                                {{-- <form
                                                                    action="{{ route('villa.cvStaff', $job->villa->username) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="text-center">
                                                                        <button type="submit" href=""
                                                                            class="btn btn-primary">Download CV</button>
                                                                    </div>
                                                                </form> --}}
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

    </div>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection
