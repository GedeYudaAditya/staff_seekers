@extends('villa.layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="card px-2" style="width: 35rem;">
        <img style="height: 200px" src="https://via.placeholder.com/640x480.png/00aa77?text=voluptatum"
            class="card-img-top img-fluid mt-2" alt="img">
        <div class="mt-5">
            <h5>Billie Eilish Lorem ipsum dolor sit amet.</h5>
        </div>
        <div class="mt-3">
            <h6>Preferred job</h6>
        </div>
        <div class="desc">
            <p><i class="fas fa-solid fa-person-swimming fa-fw me-2"></i>Poolman</p>
            <p><i class="fas fa-solid fa-person-swimming fa-fw me-2"></i>Poolman</p>
        </div>
        <div class="mt-3">
            <h6>About Me</h6>
        </div>
        <div class="desc">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Ipsa impedit id doloribus ab laboriosam praesentium reiciendis ad possimus eligendi, nemo, quis
                dolore
                dicta, aspernatur odit.
            </p>
        </div>

        <div class="mt-3">
            <h6>Menu</h6>
        </div>
        <div class="desc">
            <a href="#">
                <p><i class="fas fa-solid fa-person-swimming fa-fw me-2"></i>Curriculum vitae</p>
            </a>
        </div>
        <div class="button d-grid py-5">
            <input class="btn btn-danger mb-2" type="button" value="Recruit">
        </div>
    </div>
</div>



@endsection