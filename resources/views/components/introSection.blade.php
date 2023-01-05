<section class="row py-5 justify-content-between">
    <div class="col-md-4">
        <img src="{{ asset('/img/logo.png') }}" alt="staff-seekers">

        <br>
        <span class="welcome text-danger">Welcome to Staff Seekers</span>

        <p>
            Website yang dikhususkan untuk mencari staff villa yang sesuai dengan kebutuhan anda.
        </p>
    </div>
    <div class="col-md-7">
        {{-- Corasel --}}
        <div id="carouselExampleCaptions" class="carousel slide h-280px rounded" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner h-100 rounded">
                <div class="h-100 rounded carousel-item active">
                    <img src="{{ asset('/img/slider/kemudahan.jpg') }}" class="d-block w-100 rounded"
                        style="filter: brightness(0.5)" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-slide">Menawarkan Kemudahan</h5>
                        <p>Informasi tentang staff dapat ditemukan dengan mudah</p>
                    </div>
                </div>
                <div class="h-100 rounded carousel-item">
                    <img src="{{ asset('/img/slider/untung.jpg') }}" class="d-block w-100 rounded"
                        style="filter: brightness(0.5)" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-slide">Lebih untung</h5>
                        <p>Staff mendapatkan biaya sewa awal setelah dilaksanakan kontrak</p>
                    </div>
                </div>
                <div class="h-100 rounded carousel-item">
                    <img src="{{ asset('/img/slider/komunikasi.jpg') }}" class="d-block w-100 rounded"
                        style="filter: brightness(0.5)" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-slide">Komunikasi 2 arah</h5>
                        <p>Pihak staff dapat mengajukan lamaran dengan mudah ke villa favorit.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
