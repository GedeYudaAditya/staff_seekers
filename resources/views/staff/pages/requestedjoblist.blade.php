@extends('staff.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mt-2 mb-4">
            <h3>Requested Jobs List</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table_id2" class="display" style="width:100%">
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
                                            <td>{{ $job->villa->villa_name }}</td>
                                            <td>{{ $job->villa->name }}</td>
                                            <td>{{ $job->villa->address }}</td>
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
                                            <td>
                                                {{-- {{ route('staff.jobdetail', $job->id) }}
                                                {{ route('staff.jobcancle', $job->id) }} --}}
                                                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-info"
                                                        aria-hidden="true"></i></a>
                                                @if ($job->status == 'pending')
                                                    <a href="" class="btn btn-sm btn-danger"><i class="fa fa-minus"
                                                            aria-hidden="true"></i></a>
                                                @else
                                                    <button disabled class="btn btn-sm btn-secondary"><i class="fa fa-minus"
                                                            aria-hidden="true"></i></button>
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
    @endsection
