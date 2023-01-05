@extends('staff.layouts.app')

@section('content')
    {{-- Intro Section Start --}}
    <div class="container mt-5">
        @include('components.introSection')
    </div>
    {{-- Intro Section End --}}

    <section class="bg-light py-5 mb-5">
        <h3 class="text-center">
            Tentang Kami
        </h3>
        {{-- <div class="d-flex justify-content-center">
            <img src="{{ asset('/img/logo.png') }}" width="100" alt="staff-seekers">
        </div> --}}
        <div class="description text-center mx-5 mb-5 mt-3">
            Staff Seekers adalah sebuah website yang akan menjadi penghubung antara pencari kerja dibidang villa
            dan pemilik villa. Dengan adanya website ini, pencari kerja dapat dengan mudah mencari pekerjaan dan
            pemilik villa dapat dengan mudah mencari karyawan yang sesuai dengan kebutuhan villa mereka. Kemudahan yang
            dapat di peroleh yaitu :
        </div>

        {{-- 3 col --}}
        <div class="container marketing">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <i style="font-size: 80px" class="fa fa-check-circle" aria-hidden="true"></i>
                    </div>
                    <h2 class="fw-normal">Kemudahan Akses</h2>
                    <p>Website ini dapat diakses dimana saja dan kapan saja.</p>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <i style="font-size: 80px" class="fa fa-flash" aria-hidden="true"></i>
                    </div>
                    <h2 class="fw-normal">Cepat</h2>
                    <p>Website ini dapat menjadi solusi untuk anda jika ingin mendapatkan kariawan atau villa yang tepat
                        untuk anda.</p>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <i style="font-size: 80px" class="fa fa-bar-chart-o" aria-hidden="true"></i>
                    </div>
                    <h2 class="fw-normal">Menguntungkan</h2>
                    <p>Staff akan mendapatkan uang muka dari villa di awal kontrak kerja.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-5 mb-5">
        <div class="container">
            <h3 class="text-center mb-3">Fitur Utama</h3>

            <div class="row">
                <div class="col-lg-6 text-md-end border-md-end">
                    <h3 class="fw-normal">Cari Villa</h3>

                    <img class="img-fluid rounded" width="300" src="{{ asset('/img/index/pekerja.jpg') }}" alt=""
                        srcset="">

                    <p>
                        Anda dapat mencari villa yang sesuai dengan kebutuhan anda dengan sangat mudah.
                    </p>
                    {{-- <p><a class="btn btn-secondary" href="{{ route('villa.index') }}">Cari Villa &raquo;</a></p> --}}
                </div>
                <div class="col-lg-6 border-md-start">
                    <h3 class="fw-normal">Cari Staff</h3>

                    <img class="img-fluid rounded" width="300" src="{{ asset('/img/index/manager.jpg') }}" alt=""
                        srcset="">

                    <p>Anda dapat mencari staff yang sesuai dengan kebutuhan villa anda.</p>
                    {{-- <p><a class="btn btn-secondary" href="{{ route('staff.index') }}">Cari Staff &raquo;</a></p> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5 mb-5">
        <h3 class="text-center mb-5">Bagaimana Kata Mereka?</h3>
        <div id="carouselExampleControls" style="height: 200px;" class="carousel carousel-dark slide"
            data-bs-ride="carousel">
            <div class="carousel-inner" style="height: 200px;">
                <div class="carousel-item active" style="height: 200px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height: 200px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



    </section>

    <section class="mx-5">
        <div class="marketing">

            <h3 class="text-center mb-3">Tim Kami</h3>
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('/img/dev/wicak.jpg') }}" class="bd-placeholder-img rounded-circle shadow"
                        width="140" height="140" alt="" srcset="">
                    <hr>
                    <h2 class="fw-normal">Frontend</h2>
                    <p><b>Wahyu Singgih Wicaksono</b>, bertanggung jawab sebagai pengembang tampilan website dan user
                        experience
                        dari website ini.</p>
                    {{-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> --}}
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="{{ asset('/img/dev/anik.jpg') }}" class="bd-placeholder-img rounded-circle shadow"
                        width="140" height="140" alt="" srcset="">
                    <hr>
                    <h2 class="fw-normal">System Analyst</h2>
                    <p><b>Ni Wayan Anik Puspita Sari</b>, bertanggung jawab sebagai perencana alur kerja website sekaligus
                        database
                        dan proses bisnis yang terjadi pada website.</p>
                    {{-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> --}}
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="{{ asset('/img/dev/yuda.png') }}" class="bd-placeholder-img rounded-circle shadow"
                        width="140" height="140" alt="" srcset="">
                    <hr>
                    <h2 class="fw-normal">Backend</h2>
                    <p><b>Gede Yuda Aditya</b>, bertanggung jawab sebagai pengembang sekaligus perancang proses dibalik
                        layar dan
                        mengatasi masalah teknis website.</p>
                    {{-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> --}}
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->



        </div>
    </section>

    <!-- /END THE FEATURETTES -->
@endsection
