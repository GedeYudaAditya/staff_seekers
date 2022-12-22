@extends('admin.layouts.app')

@section('content')
    <div class="container py-3 rounded bg-light h-100">
        <h3 class="text-center">Hallo Admin</h3>
        <hr>
        <div class="row">
            {{-- card pemasukan --}}
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body text-danger">
                        <h5 class="card-title"> <i class="fa-solid fa-money-bill-trend-up"></i> Pemasukan</h5>
                        <p class="card-text">Rp. 100.000</p>

                        <a href="#" class="text-decoration-none">
                            Lihat Detail >></a>
                    </div>
                </div>
            </div>
            {{-- end card pemasukan --}}

            {{-- card jumlah user --}}
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body text-success">
                        <h5 class="card-title"> <i class="fa-solid fa-user-check"></i> Jumlah User</h5>
                        <p class="card-text">{{$user}}</p>

                        <a href="#" class="text-decoration-none">
                            Lihat Detail >></a>
                    </div>
                </div>
            </div>

            {{-- end card jumlah user --}}

            {{-- card jumlah user villa --}}
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body text-warning">
                        <h5 class="card-title"> <i class="fa-solid fa-building-user"></i> Jumlah User Villa</h5>
                        <p class="card-text">{{$villa}}</p>

                        <a href="#" class="text-decoration-none">
                            Lihat Detail >></a>
                    </div>
                </div>
            </div>
            {{-- end card jumlah user villa --}}
        </div>
        <div class="row mt-3">
            {{-- chart --}}
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div>
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
    </script>

    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script>
        const labels2 = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data2 = {
            labels: labels2,
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {}
        };
    </script>

    <script>
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>
@endsection
