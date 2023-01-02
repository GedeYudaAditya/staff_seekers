@extends('villa.layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/villa/style.css') }}">
@endsection

@section('content')
    <div class="container py-5 h-100">
        <h1 class="mb-5">Manajemen Kontrak</h1>

        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            {{-- Staff Request vilaa --}}
            <h6>Permintaan Anda</h6>
            <div class="col-md-12 bg-light shadow rounded p-3 mb-3">
                <table id="table_id2" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Pengaju</th>
                            <th>Alamat</th>
                            <th>CV</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffsRequest as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->address }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ asset('storage/cv/' . $item->user->cv) }}"
                                        target="_blank">Lihat CV</a>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form action="#" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Buat Kontrak</button>
                                        </form>
                                        <form action="#" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Hubungi</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Staff Request villa --}}
            <h6>Permintaan Staff</h6>
            <div class="col-md-12 bg-light shadow rounded p-3 mb-3">
                <table id="table_id3" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Pengaju</th>
                            <th>Alamat</th>
                            <th>CV</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($villaStaffsRequest as $item)
                            <tr>
                                <td>{{ $item->staff->name }}</td>
                                <td>{{ $item->staff->address }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ asset('storage/cv/' . $item->staff->cv) }}"
                                        target="_blank">Lihat CV</a>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <form action="#" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Buat Kontrak</button>
                                        </form>
                                        <form action="#" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success-light btn-sm">Hubungi</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#table_id2').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table_id3').DataTable();
        });
    </script>
@endsection
