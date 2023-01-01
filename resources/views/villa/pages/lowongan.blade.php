@extends('villa.layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/villa/style.css') }}">
@endsection

@section('content')
    <div class="container py-5 h-100">
        <h1>Lowongan</h1>

        <div class="row">
            {{-- tommbol tambah --}}
            <div class="col-md-12 mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahLowongan">
                    Tambah Lowongan
                </button>
            </div>

            {{-- alert error and success --}}
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

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table_id" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    {{-- <th>Salary</th> --}}
                                    <th>Hiring</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcements as $announc)
                                    <tr>
                                        <td>{{ $announc->title }}</td>
                                        <td>{{ $announc->created_at->diffForHumans() }}</td>
                                        <td>{{ $announc->updated_at->diffForHumans() }}</td>
                                        {{-- <td>{{ $announc->user->salary }}</td> --}}
                                        <td>
                                            {{ $announc->hiring }}
                                        </td>
                                        <td class="row">
                                            {{-- {{ route('villa.announcdetail', $announc->id) }}
                                        {{ route('villa.announccancle', $announc->id) }} --}}
                                            <a href="" class="btn btn-sm btn-primary col-12 mb-1"><i
                                                    class="fa fa-info" aria-hidden="true"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-minus"
                                                    aria-hidden="true"></i></a>
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

    {{-- Modal Form Tambah Lowongan --}}
    <div class="modal fade" id="modalTambahLowongan" tabindex="-1" aria-labelledby="modalTambahLowonganLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLowonganLabel">Tambah Lowongan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('villa.createLowongan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="mb-3">
                            <label for="hiring" class="form-label">Hiring</label>
                            <input type="text" class="form-control" id="hiring" name="hiring">
                        </div>
                        <div class="mb-3">
                            <label for="thumbnaill" class="form-label">Thumbnaill</label>
                            <input type="file" class="form-control" id="thumbnaill" name="thumbnail">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-danger">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    {{-- Intro Section Start --}}
@endsection
