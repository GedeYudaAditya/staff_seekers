@extends('guest.layouts.app')

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
                    <img src="{{ asset('/img/dev/wicak.png') }}" class="bd-placeholder-img rounded-circle shadow"
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
    {{-- <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="container">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-muted">It’ll
                        blow your mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some
                    exciting prose here.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%"
                        fill="#aaa" dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See
                        for yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea
                    of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%"
                        fill="#aaa" dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span
                        class="text-muted">Checkmate.</span>
                </h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not
                    really intended to be actually read, simply here to give you a better view of what this would
                    look like with some actual content. Your content.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%"
                        fill="#aaa" dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

    </div>
    <hr class="featurette-divider"> --}}
@endsection
