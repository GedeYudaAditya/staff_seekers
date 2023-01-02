@extends('staff.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="mt-2 mb-4">
        <h3>Contract's List</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table_id2" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Contract</th>
                                    <th>Location</th>
                                    {{-- <th>Salary</th> --}}
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $contract)
                                <tr>
                                    <td>{{ $contract->title }}</td>
                                    {{-- <td>{{ $contract->villa->name }}</td> --}}
                                    <td>{{ $contract->villa->address }}</td>
                                    {{-- <td>{{ $contract->villa->salary }}</td> --}}

                                    <td>
                                        @if ($contract->status == 'pending')
                                        <span class="badge bg-secondary py-2">Pending</span>
                                        @elseif($contract->status == 'accepted')
                                        <span class="badge bg-success py-2">Accepted</span>
                                        @else
                                        <span class="badge bg-danger py-2">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $contract->start_date }}
                                    </td>
                                    <td>
                                        {{ $contract->end_date }}
                                    </td>
                                    <td colspan="0">
                                        {{-- {{ route('staff.contractdetail', $contract->id) }}
                                        {{ route('staff.contractcancle', $contract->id) }} --}}
                                        {{-- <a href="" class="btn btn-sm btn-primary"><i class="fa fa-info"
                                                aria-hidden="true"></i></a> --}}
                                        {{-- @if ($contract->status == 'pending')
                                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-minus"
                                                aria-hidden="true"></i></a>
                                        @else
                                        <button disabled class="btn btn-sm btn-secondary"><i class="fa fa-minus"
                                                aria-hidden="true"></i></button>
                                        @endif --}}
                                        <a class="btn btn-sm btn-success"><i class="fa fa-check"
                                                aria-hidden="true"></i></a>
                                        <form action="{{ route('staff.declineContract', $contract->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-minus"
                                                    aria-hidden="true"></i></button>
                                        </form>
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