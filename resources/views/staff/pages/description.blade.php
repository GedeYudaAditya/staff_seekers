@extends('staff.layouts.app')

@section('content')
    <div class="container">
        <div class="description w-100 text-center">
            <div class="header mt-5">
                <h5>The Ubud Villa</h5>
                <div class="info mt-2 ">
                    <div>jalan raya ubud no. 178B, ubud, Bali</div>
                    <div class="mt-0">email: ubud.villa@gmail.com</div>
                </div>
                <div class="card w-100">
                    <img src="{{ asset('/img/villa1.jpg') }}" class="h-75" alt="">
                </div>

            </div>
            <div class="card px-2 w-100">

                <div class="mt-5">
                    <h6>About Us</h6>
                </div>
                <div class="desc">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ipsa impedit id doloribus ab laboriosam praesentium reiciendis ad possimus eligendi, nemo, quis
                        dolore
                        dicta, aspernatur odit.
                    </p>
                </div>
                <div>
                    <h6 class="text-center">Salary</h6>
                </div>
                <div class="text-center">
                    <p>Rp.2.500.000 - Rp. 15.000.000</p>
                </div>
                <div class="col-lg-3 py-2 text-center w-100">
                    <h6>Hire</h6>
                    <div class="container d-flex justify-content-evenly">
                        <div>
                            <i class="fas fa-user-tie fa-fw me-4"></i>Manager</li>
                        </div>
                        <div>
                            <i class="fas fa-solid fa-person-swimming fa-fw me-4"></i>Poolman</li>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-2 text-center w-100">
                    <h6>Require</h6>
                    <div class="container d-flex justify-content-evenly">
                        <div>
                            <i class="fas fa-solid fa-language me-4"></i>Speak English</li>
                        </div>
                        <div>
                            <i class="fas fa-solid fa-briefcase fa-fw me-4"></i>2 years of experience</li>
                        </div>
                    </div>
                </div>
                <div class="button d-grid py-5">
                    <input class="btn btn-danger" type="button" value="Apply">
                </div>

            </div>
        </div>
    </div>
@endsection
