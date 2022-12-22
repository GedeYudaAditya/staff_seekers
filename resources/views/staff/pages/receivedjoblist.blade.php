@extends('staff.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mt-2 mb-4">
            <h3>Requested Jobs List</h3>

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
                                            <td class="row">
                                                {{-- {{ route('villa.jobdetail', $job->id) }}
                                                {{ route('villa.jobcancle', $job->id) }} --}}
                                                <a href="" class="btn btn-sm btn-primary col-12 mb-1"><i
                                                        class="fa fa-info" aria-hidden="true"></i></a>
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

    </div>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection
