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
                                                @switch($contract->status)
                                                    @case('selesai')
                                                        <span class="badge bg-success py-2">Selesai</span>
                                                    @break

                                                    @case('process')
                                                        <span class="badge bg-warning py-2">Pending</span>
                                                    @break

                                                    @case('berjalan')
                                                        <span class="badge bg-success py-2">Berjalan</span>
                                                    @break

                                                    @case('batal')
                                                        <span class="badge bg-danger py-2">Batal</span>
                                                    @break
                                                @endswitch
                                                {{-- @if ($contract->status == 'selesai')
                                        <span class="badge bg-secondary py-2">Pending</span>
                                        @elseif($contract->status == '')
                                        <span class="badge bg-success py-2">Accepted</span>
                                        @else
                                        <span class="badge bg-danger py-2">Rejected</span>
                                        @endif --}}
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

                                                {{-- <a class="btn btn-sm btn-success"><i class="fa fa-check"
                                                aria-hidden="true"></i></a> --}}
                                                <form action="{{ route('staff.acceptContract', $contract->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $contract->id }}"><i
                                                            class="fa fa-info" aria-hidden="true"></i></button>
                                                    @if ($contract->status == 'process')
                                                        <button class="btn btn-sm btn-success"><i class="fa fa-check"
                                                                aria-hidden="true"></i></button>
                                                    @else
                                                        <button disabled class="btn btn-sm btn-secondary"><i
                                                                class="fa fa-check" aria-hidden="true"></i></button>
                                                    @endif
                                                </form>
                                                <form action="{{ route('staff.declineContract', $contract->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @if ($contract->status == 'process')
                                                        <button class="btn btn-sm btn-danger"><i class="fa fa-minus"
                                                                aria-hidden="true"></i></button>
                                                    @else
                                                        <button disabled class="btn btn-sm btn-secondary"><i
                                                                class="fa fa-minus" aria-hidden="true"></i></button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $contract->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Staff
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">

                                                            <div class="container mb-3">

                                                                <h4 class="text-center">Contract</h4>
                                                                <p class="text-center">Contract name :
                                                                    {{ $contract->title }}</p>
                                                                <h6>Pesan :</h6>
                                                                <p class="text-justify">
                                                                    {{ $contract->description }}
                                                                </p>
                                                                <hr>
                                                                {{-- contract --}}
                                                                <div
                                                                    class="container font-monospace border p-3 text-dark bg-light">
                                                                    <h5 class="text-center">SURAT PERJANJIAN KERJA KONTRAK
                                                                    </h5> <br>

                                                                    Nomer:
                                                                    {{ $contract->id . '/' . $contract->villa->name . '/' . $contract->staff->name . '/' . $contract->created_at->format('Y') }}
                                                                    <hr>
                                                                    Yang bertanda tangan di bawah ini: <br><br>

                                                                    Nama----------------------:
                                                                    {{ $contract->villa->name }} <br>
                                                                    Jabata--------------------: Pemilik Villa <br>
                                                                    Alamat--------------------:
                                                                    {{ $contract->villa->address }} <br> <br>
                                                                    Dalam hal ini bertindak atas nama direksi pemilik villa
                                                                    {{ $contract->villa->villa_name }} yang berkedudukan di
                                                                    {{ $contract->villa->address }} dan selanjutnya disebut
                                                                    PIHAK PERTAMA. <br><br>

                                                                    Nama----------------------:
                                                                    {{ $contract->staff->name }} <br>
                                                                    Tempat dan tanggal lahir--:
                                                                    {{ $contract->staff->name }}
                                                                    <br>
                                                                    Alamat--------------------:
                                                                    {{ $contract->staff->address }} <br>
                                                                    Telepon-------------------:
                                                                    {{ $contract->staff->phone }} <br><br>

                                                                    Dalam hal ini bertindak untuk dan atas nama diri pribadi
                                                                    dan selanjutnya disebut PIHAK KEDUA. <br><br>

                                                                    <b>PASAL 1 MASA KERJA</b> <br><br>

                                                                    <i>Ayat 1</i> <br>

                                                                    PIHAK PERTAMA menyatakan menerima PIHAK KEDUA sebagai
                                                                    karyawan kontrak di perusahaan
                                                                    {{ $contract->villa->villa_name }} yang berkedudukan di
                                                                    {{ $contract->position }} dan PIHAK KEDUA dengan ini
                                                                    menyatakan
                                                                    kesediaannya. <br><br>

                                                                    <i>Ayat 2</i> <br>

                                                                    @php
                                                                        // cari selisih hari dimulai - akhir
                                                                        // $contractdiffstartend = \Carbon\Carbon::parse($contract->start_date)->diffInDays($contract->end_date);
                                                                        
                                                                        // ambil bentuk penulisan manusia
                                                                        $contractdiffstartend = \Carbon\Carbon::parse($contract->start_date)->diffForHumans($contract->end_date);
                                                                    @endphp

                                                                    Perjanjian kerja ini berlaku untuk jangka waktu
                                                                    {{ $contractdiffstartend }}, terhitung sejak tanggal
                                                                    {{ $contract->start_date }} dan berakhir pada
                                                                    tanggal {{ $contract->end_date }}. <br><br>

                                                                    <b>TATA TERTIB PERUSAHAAN</b> <br><br>
                                                                    <i>Ayat 1</i> <br>

                                                                    PIHAK KEDUA menyatakan kesediaannya untuk mematuhi serta
                                                                    mentaati seluruh peraturan tata tertib perusahaan yang
                                                                    telah ditetapkan PIHAK PERTAMA. <br><br>

                                                                    <i>Ayat 2</i> <br>

                                                                    Pelanggaran terhadap peraturan-peraturan tersebut di
                                                                    atas dapat mengakibatkan PIHAK KEDUA dijatuhi:
                                                                    Skorsing, atau
                                                                    Pemutusan Hubungan Pekerjaan (PHK), atau
                                                                    Hukuman dalam bentuk lain dengan merujuk kepada
                                                                    Peraturan Pemerintah yang mengaturnya. <br><br>

                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <p class="text-center">PIHAK PERTAMA</p>
                                                                            @if ($contract->status != 'batal')
                                                                                <div class="text-success m-3 text-center">
                                                                                    (Tertandatangani)
                                                                                </div>
                                                                            @else
                                                                                <div class="text-danger m-3 text-center">
                                                                                    (Batal)
                                                                                </div>
                                                                            @endif
                                                                            <p class="text-center">
                                                                                {{ $contract->villa->name }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="text-center">PIHAK KEDUA</p>
                                                                            @if ($contract->status != 'batal' && $contract->status != 'process')
                                                                                <div class="text-success m-3 text-center">
                                                                                    (Tertandatangani)
                                                                                </div>
                                                                            @else
                                                                                <div class="text-secondary m-3 text-center">
                                                                                    (Belum Tertandatangani)
                                                                                </div>
                                                                            @endif
                                                                            <p class="text-center">
                                                                                {{ $contract->staff->name }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <form
                                                                    action="{{ route('villa.cvStaff', $contract->staff->username) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="text-center">
                                                                        <button type="submit" href=""
                                                                            class="btn btn-primary">Download CV
                                                                            {{ $contract->staff->name }}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="card mb-3" style="width: 100%">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img src="{{ $contract->villa->image != 'default.png' ? asset('/storage/avatars/' . $contract->villa->image) : asset('/img/avatars/' . $contract->villa->image) }}"
                                                                            class="img-fluid rounded-start h-100"
                                                                            alt="{{ $contract->villa->name }}">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title fw-bold">
                                                                                {{ $contract->villa->name }}
                                                                            </h3>
                                                                            <div class="row mb-3">
                                                                                <div class="col-12">
                                                                                    <div class="fs-small text-md-start">
                                                                                        <i class="fa fa-home"
                                                                                            aria-hidden="true"></i>
                                                                                        Villa :
                                                                                        {{ $contract->villa->villa_name }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="fs-small text-md-start">
                                                                                        <i class="fa fa-envelope"
                                                                                            aria-hidden="true"></i>
                                                                                        Email :
                                                                                        {{ $contract->villa->email }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="fs-small text-md-start">
                                                                                        <i class="fa fa-phone"
                                                                                            aria-hidden="true"></i>
                                                                                        Phone :
                                                                                        {{ $contract->villa->phone }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="fs-small">
                                                                                        <i class="fa fa-map"
                                                                                            aria-hidden="true"></i>
                                                                                        Adderss :
                                                                                        {{ $contract->villa->address }}
                                                                                    </div>
                                                                                </div>
                                                                                {{-- <div class="col-12">
                                                                                    <div class="fw-bold">
                                                                                        <i class="fa fa-money"
                                                                                            aria-hidden="true"></i>
                                                                                        Salary : {{ $contract->villa->salary }}
                                                                                    </div>
                                                                                </div> --}}
                                                                            </div>
                                                                            <p class="card-text">
                                                                                {{ $contract->villa->bio }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card mb-3" style="width: 100%">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img src="{{ $contract->staff->image != 'default.png' ? asset('/storage/avatars/' . $contract->staff->image) : asset('/img/avatars/' . $contract->staff->image) }}"
                                                                            class="img-fluid rounded-start h-100"
                                                                            alt="{{ $contract->staff->name }}">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title fw-bold">
                                                                                {{ $contract->staff->name }}
                                                                            </h3>
                                                                            <div class="row mb-3">
                                                                                <div class="col-12">
                                                                                    <div class="fs-small text-md-start">
                                                                                        <i class="fa fa-envelope"
                                                                                            aria-hidden="true"></i>
                                                                                        Email :
                                                                                        {{ $contract->staff->email }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="fs-small text-md-start">
                                                                                        <i class="fa fa-phone"
                                                                                            aria-hidden="true"></i>
                                                                                        Phone :
                                                                                        {{ $contract->staff->phone }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="fs-small">
                                                                                        <i class="fa fa-map"
                                                                                            aria-hidden="true"></i>
                                                                                        Adderss :
                                                                                        {{ $contract->staff->address }}
                                                                                    </div>
                                                                                </div>
                                                                                {{-- <div class="col-12">
                                                                                    <div class="fw-bold">
                                                                                        <i class="fa fa-money"
                                                                                            aria-hidden="true"></i>
                                                                                        Salary : {{ $contract->staff->salary }}
                                                                                    </div>
                                                                                </div> --}}
                                                                            </div>
                                                                            <p class="card-text">
                                                                                {{ $contract->staff->bio }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                        @if ($contract->status == 'pending')
                                                            <form
                                                                action="{{ route('staff.acceptContract', $contract->id) }}"
                                                                method="post" class="d-inline">
                                                                @csrf
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-success">Accept</button>
                                                            </form>
                                                            <form
                                                                action="{{ route('staff.declineContract', $contract->id) }}"
                                                                method="post" class="d-inline">
                                                                @csrf
                                                                <button class="btn btn-danger">Decline</button>
                                                                <a target="blank"
                                                                    href="https://wa.me/{{ $contract->villa->phone }}?text=Halo%20{{ $contract->villa->name }},%20Saya%20{{ $contract->staff->name }}%20menerima%20pekerjaan%20anda%20untuk%20{{ $contract->villa->name }}"
                                                                    class="btn btn-success">Hubungi</a>
                                                            </form>
                                                        @elseif($contract->status == 'berjalan' || $contract->status == 'selesai')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a target="blank"
                                                                href="https://wa.me/{{ $contract->villa->phone }}?text=Halo%20{{ $contract->villa->name }},%20Saya%20{{ $contract->staff->name }}%20menerima%20pekerjaan%20anda%20untuk%20{{ $contract->villa->name }}"
                                                                class="btn btn-success">Hubungi</a>
                                                        @elseif($contract->status == 'batal')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        @endif
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
            $('#table_id2').DataTable();
        });
    </script>
@endsection
