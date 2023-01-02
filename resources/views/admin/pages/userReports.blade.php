@extends('admin.layouts.app')

@section('content')
    <div class="container py-3 rounded bg-light h-100">
        <h3 class="text-center">User Report</h3>
        <hr>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama_User</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Title</th>
                                        {{-- <th>Deskripsi</th> --}}
                                        <th>Status</th>
                                        <th>Detail</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($report as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->title }}</td>
                                            {{-- <td>{{ $item->description}}</td> --}}
                                            <td>
                                                @if ($item->status == 'processed')
                                                    <span class="badge bg-warning">processed</span>
                                                @elseif($item->status == 'pending')
                                                    <span class="badge bg-danger">pending</span>
                                                @else
                                                    <span class="badge bg-success">done</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->slug}}"
                                                    class="btn btn-sm btn-warning">Edit</button>

                                            </td>

                                        </tr>
                                        <div class="modal fade" id="exampleModal{{$item->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('admin.user.reportProcess',$item->slug)}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Deskripsi Masalah" id="floatingTextarea2" style="height: 100px" disabled readonly>{{$item->description}}
                                                        </textarea>
                                                        <label for="floatingTextarea2">Deskripsi</label>
                                                      </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" name="status" id="status">
                                                            <option disabled>-- Status --</option>
                                                            <option {{$item->status == 'processed' ? 'selected' : ''}} value="processed">processed</option>
                                                            <option {{$item->status == 'pending' ? 'selected' : ''}} value="pending">pending</option>
                                                            <option {{$item->status == 'done' ? 'selected' : ''}} value="done">done</option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Save</button>
                                                </div></form>

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