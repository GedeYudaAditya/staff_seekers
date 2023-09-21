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

        <div class="accordion shadow rounded" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Pengajuan Kontrak Permintaan Ikut Bekerja dari Staff
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{-- Staff Request vilaa --}}
                        <div class="col-md-12">
                            <table id="table_id2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Dibuat Pada</th>
                                        <th>Nama Pengaju</th>
                                        <th>Alamat</th>
                                        <th>CV</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staffsRequest as $item)
                                        <tr>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->address }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ asset('storage/cv/' . $item->user->cv) }}"
                                                    target="_blank">Lihat CV</a>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $item->id }}"
                                                        class="btn btn-warning btn-sm">Buat
                                                        Kontrak</button>
                                                    <a target="blank"
                                                        href="https://wa.me/{{ $item->user->phone }}?text=Halo%20{{ $item->user->name }},%20Saya%20{{ $item->villa->name }}%20dari%20villa%20{{ $item->villa->villa_name }}"
                                                        class="btn btn-success btn-sm">Hubungi</a>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- modal --}}
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="exampleModalLabel{{ $item->id }}">Buat Kontrak</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('villa.createContract', $item->user->username) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="title">Judul Kontrak</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title" placeholder="Judul Kontrak" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Nama
                                                                    Pengaju:</label>
                                                                <input type="text" class="form-control"
                                                                    id="recipient-name{{ $item->id }}"
                                                                    value="{{ $item->user->name }}" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Alamat:</label>
                                                                <textarea class="form-control" id="message-text{{ $item->id }}" disabled>{{ $item->user->address }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">CV:</label>
                                                                <a class="btn btn-primary btn-sm"
                                                                    href="{{ asset('storage/cv/' . $item->user->cv) }}"
                                                                    target="_blank">Lihat CV</a>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Jabatan:</label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example" name="position">
                                                                    <option selected>Pilih Jabatan</option>
                                                                    <option value="1">Koki</option>
                                                                    <option value="2">Pelayan</option>
                                                                    <option value="3">Pembersih</option>
                                                                    <option value="4">Security</option>
                                                                    <option value="5">Driver</option>
                                                                    <option value="6">Pengemudi</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Rekening:</label>
                                                                <input disabled type="text"
                                                                    value="{{ $item->user->no_rek }}"
                                                                    class="form-control" name="price">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Uang
                                                                    Muka:</label>
                                                                <input type="number" class="form-control"
                                                                    name="price">
                                                            </div>
                                                            {{-- bukti bayar --}}
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Bukti
                                                                    Pembayaran:</label>
                                                                <input type="file" class="form-control"
                                                                    name="bukti_pembayaran">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Tanggal
                                                                    Mulai:</label>
                                                                <input type="date" class="form-control"
                                                                    name="start_date">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Tanggal
                                                                    Berakhir:</label>
                                                                <input type="date" class="form-control"
                                                                    name="end_date">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Deskripsi:</label>
                                                                <textarea class="form-control" name="description"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Signature:</label>
                                                                <input type="password"
                                                                    placeholder="masukkan kata sandi anda"
                                                                    class="form-control" name="signatures_villa" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
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
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Pengajuan Kontrak Permintaan Staff dari Anda
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{-- Villa  request staff --}}
                        <div class="col-md-12">
                            <table id="table_id3" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Dibuat Pada</th>
                                        <th>Nama Pengaju</th>
                                        <th>Alamat</th>
                                        <th>CV</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($villaStaffsRequest as $item)
                                        <tr>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>{{ $item->staff->name }}</td>
                                            <td>{{ $item->staff->address }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ asset('storage/cv/' . $item->staff->cv) }}"
                                                    target="_blank">Lihat CV</a>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#example2Modal{{ $item->id }}"
                                                        class="btn btn-warning btn-sm">Buat
                                                        Kontrak</button>
                                                    <a target="blank"
                                                        href="https://wa.me/{{ $item->staff->phone }}?text=Halo%20{{ $item->staff->name }},%20Saya%20{{ $item->user->name }}%20dari%20villa%20{{ $item->user->villa_name }}"
                                                        class="btn btn-success btn-sm">Hubungi</a>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- modal --}}
                                        <div class="modal fade" id="example2Modal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="example2ModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="example2ModalLabel{{ $item->id }}">Buat Kontrak</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('villa.createContract', $item->staff->username) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="title">Judul Kontrak</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title" placeholder="Judul Kontrak" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Nama
                                                                    Staff:</label>
                                                                <input type="text" class="form-control"
                                                                    id="recipient-name{{ $item->id }}"
                                                                    value="{{ $item->staff->name }}" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Alamat:</label>
                                                                <textarea class="form-control" id="message-text{{ $item->id }}" disabled>{{ $item->staff->address }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">CV:</label>
                                                                <a class="btn btn-primary btn-sm"
                                                                    href="{{ asset('storage/cv/' . $item->staff->cv) }}"
                                                                    target="_blank">Lihat CV</a>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Jabatan:</label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example" name="position">
                                                                    <option selected>Pilih Jabatan</option>
                                                                    <option value="1">Koki</option>
                                                                    <option value="2">Pelayan</option>
                                                                    <option value="3">Pembersih</option>
                                                                    <option value="4">Security</option>
                                                                    <option value="5">Driver</option>
                                                                    <option value="6">Pengemudi</option>
                                                                    <option value="7">Pengawas</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Rekening:</label>
                                                                <input disabled type="text"
                                                                    value="{{ $item->staff->no_rek }}"
                                                                    class="form-control" name="price">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Uang
                                                                    Muka:</label>
                                                                <input type="number" class="form-control"
                                                                    name="price">
                                                            </div>
                                                            {{-- bukti bayar --}}
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Bukti
                                                                    Pembayaran:</label>
                                                                <input type="file" class="form-control"
                                                                    name="bukti_pembayaran">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Tanggal
                                                                    Mulai:</label>
                                                                <input type="date" class="form-control"
                                                                    name="start_date">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Tanggal
                                                                    Berakhir:</label>
                                                                <input type="date" class="form-control"
                                                                    name="end_date">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Deskripsi:</label>
                                                                <textarea class="form-control" name="description"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Signature:</label>
                                                                <input type="password"
                                                                    placeholder="masukkan kata sandi anda"
                                                                    class="form-control" name="signatures_villa" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
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
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Kontrak Yang Anda Buat
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{-- Villa  request staff --}}
                        <div class="col-md-12">
                            <table id="table_id4" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Dibuat Pada</th>
                                        <th>Judul</th>
                                        <th>Pihak Pekerja</th>
                                        <th>Status</th>
                                        {{-- <th>Status Pembayaran</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts as $item)
                                        <tr>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->staff->name }}</td>
                                            <td>
                                                @if ($item->status == 'process')
                                                    <span class="badge bg-secondary"><i class="fa fa-hourglass"
                                                            aria-hidden="true"></i></span>
                                                @elseif($item->status == 'berjalan')
                                                    <span class="badge bg-warning"><i class="fa fa-play-circle"
                                                            aria-hidden="true"></i></span>
                                                @elseif($item->status == 'selesai')
                                                    <span class="badge bg-success"><i class="fa fa-check-circle"
                                                            aria-hidden="true"></i></span>
                                                @elseif($item->status == 'batal')
                                                    <span class="badge bg-danger"><i class="fa fa-warning"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                @if ($item->payment_status == 'pending')
                                                    <span class="badge bg-secondary"><i class="fa fa-times-circle"
                                                            aria-hidden="true"></i></span>
                                                @elseif($item->payment_status == 'valid')
                                                    <span class="badge bg-success"><i class="fa fa-check-circle"
                                                            aria-hidden="true"></i></span>
                                                @elseif($item->payment_status == 'invalid')
                                                    <span class="badge bg-danger"><i class="fa fa-warning"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </td> --}}
                                            <td>
                                                <form action="{{ route('villa.processContract', $item->id) }}"
                                                    onsubmit="return confirm('Apakah anda yakin?')" method="post">
                                                    @csrf
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic mixed styles example">
                                                        @if ($item->status == 'process')
                                                            <button type="submit" value="delete" name="confirm"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                            </button>
                                                        @elseif($item->status == 'berjalan')
                                                            <button type="submit" value="finish" name="confirm"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="fa fa-stop-circle" aria-hidden="true"></i>
                                                            </button>
                                                        @elseif($item->status == 'batal')
                                                            <button type="submit" value="delete" name="confirm"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        @elseif($item->status == 'selesai')
                                                            <button type="submit" value="delete" name="confirm"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="submit" value="perpanjang" name="confirm"
                                                                class="btn btn-info btn-sm">
                                                                <i class="fa fa-step-forward" aria-hidden="true"></i>
                                                            </button>
                                                        @endif
                                                        <a target="blank"
                                                            href="https://wa.me/{{ $item->staff->phone }}?text=Halo%20{{ $item->staff->name }},%20Saya%20{{ $item->villa->name }}%20menerima%20anda%20dalam%20bekerja%20di%20{{ $item->villa->villa_name }}"
                                                            class="btn btn-success btn-sm"><i class="fa fa-whatsapp"
                                                                aria-hidden="true"></i></a>
                                                    </div>
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
    <script>
        $(document).ready(function() {
            $('#table_id4').DataTable();
        });
    </script>
@endsection
