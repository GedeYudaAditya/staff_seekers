@extends('admin.layouts.app')

@section('content')
    <div class="container py-3 rounded bg-light h-100">
        <h3 class="text-center">User</h3>
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
                                        <th>Tgl_transaksi</th>
                                        <th>Kode Transaksi</th>
                                        <th>id kontrak</th>
                                        <th>Pemilik Villa</th>

                                        <th>Jumlah Bayar</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Proses</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->code_transaction }}</td>
                                            <td>{{ $item->contract->id }}</td>
                                            <td>{{ $item->villa->villa_name }}</td>
                                            <td>{{ $item->total_price }}</td>
                                            <td>
                                                @if ($item->payment_status == 'pending')
                                                    <span class="badge bg-warning">pending</span>
                                                @elseif($item->payment_status == 'invalid')
                                                    <span class="badge bg-danger">invalid</span>
                                                @else
                                                    <span class="badge bg-success">valid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 'process')
                                                    <span class="badge bg-warning">process</span>
                                                @elseif($item->status == 'send')
                                                    <span class="badge bg-primary">send</span>
                                                @elseif($item->status == 'received')
                                                    <span class="badge bg-info">received</span>
                                                @else
                                                    <span class="badge bg-success">done</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $item->slug }}"
                                                    class="btn btn-sm btn-warning">Edit</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $item->slug }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Detail Transaksi
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.user.transactionProccess', $item->slug) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-control mb-3">
                                                                <label for="form-control">bukti Pembayaran</label>
                                                                <img src="{{ asset('storage/bukti_pembayaran/' . $item->bukti_pembayaran) }}"
                                                                    alt="" class="img-fluid">
                                                            </div>
                                                            <div class="form-floating">
                                                                <input class="form-control" type="text"
                                                                    placeholder="Kosong"
                                                                    value="Rp. {{ $item->total_price }}" readonly>
                                                                <label for="floatingTextarea2">Jumlah Pembayaran</label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Status</label>
                                                                <select class="form-select" name="payment_status"
                                                                    id="status">
                                                                    <option disabled>-- Status Pembayaran --</option>
                                                                    <option
                                                                        {{ $item->payment_status == 'pending' ? 'selected' : '' }}
                                                                        value="pending">pending</option>
                                                                    <option
                                                                        {{ $item->payment_status == 'invalid' ? 'selected' : '' }}
                                                                        value="invalid">invalid</option>
                                                                    <option
                                                                        {{ $item->payment_status == 'valid' ? 'selected' : '' }}
                                                                        value="valid">valid</option>
                                                                </select>
                                                            </div>
                                                            {{-- <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" name="status" id="status">
                                                            <option disabled>-- Status Proses --</option>
                                                            <option {{$item->status == 'process' ? 'selected' : ''}} value="pending">process</option>
                                                            <option {{$item->status == 'send' ? 'selected' : ''}} value="invalid">send</option>
                                                            <option {{$item->status == 'received' ? 'selected' : ''}} value="valid">received</option>
                                                            <option {{$item->status == 'done' ? 'selected' : ''}} value="valid">done</option>
                                                        </select>
                                                    </div> --}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>

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
