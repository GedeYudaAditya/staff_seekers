@extends('villa.layouts.dashboard')

@section('content')
    <div class="container py-5 h-100">
        <h1>List Pendaftar</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table_id2" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Pengaju</th>
                                    <th>Alamat</th>
                                    <th>CV</th>
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
                                        <td>{{ $job->user->cv }}</td>
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
                                            <a href="" class="btn btn-sm btn-primary mb-1"><i class="fa fa-info"
                                                    aria-hidden="true"></i></a>
                                            @if ($job->status == 'pending')
                                                <a href="" class="btn btn-sm btn-success col-md-6"><i
                                                        class="fa fa-plus" aria-hidden="true"></i></a>
                                                <a href="" class="btn btn-sm btn-danger col-md-6"><i
                                                        class="fa fa-minus" aria-hidden="true"></i></a>
                                            @else
                                                <button disabled class="btn btn-sm btn-success col-md-6"><i
                                                        class="fa fa-plus" aria-hidden="true"></i></button>
                                                <button disabled class="btn btn-sm btn-secondary col-md-6"><i
                                                        class="fa fa-minus" aria-hidden="true"></i></button>
                                            @endif
                                        </td>
                                    </tr>
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
