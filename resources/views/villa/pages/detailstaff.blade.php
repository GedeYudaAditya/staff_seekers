@extends('villa.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ $staff->image }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <h3>{{ $staff->name }}</h3>
                                <p>Salary: {{ $staff->salary }}</p>
                                <p>Email: {{ $staff->email }}</p>
                                <p>Phone: {{ $staff->phone }}</p>
                                <p>Alamat: {{ $staff->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
