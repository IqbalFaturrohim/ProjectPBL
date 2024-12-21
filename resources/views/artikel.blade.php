@extends('layouts.layout')
@section('title', 'Halaman Artikel')

@section('content')
<div class="position-relative" style="background-image: url('{{ asset('img/image 1.png') }}'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <div class="container text-center text-white h-100">
        <div class="d-flex flex-column justify-content-center align-items-center h-100">
            <!-- Title -->
            <h1 class="fw-bold mb-5">Website Pengenalan Goa Gajah</h1>

            <!-- Card Section -->
            <div class="row justify-content-center g-4">
                <!-- Card Template -->
                @for ($i = 0; $i < 5; $i++)
                <div class="col-md-2">
                    <div class="card bg-light border-0 shadow" style="margin-top: 50px;">
                        <div class="card-img-top-wrapper" style="padding: 10px; background: white; border-radius: 10px;">
                        <img src="{{ asset('img/Goa Gajah_ An Easy Ubud Day Trip.jpeg') }}" class="card-img-top" alt="Goa Gajah Temple">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Goa Gajah Temple</h5>
                            <p class="card-text">Pura Goa Gajah Ubud adalah...</p>
                            <div class="text-end"> <!-- Tambahkan kelas text-end di sini -->
                                <a href="#" class="btn btn-success btn-sm">Jelajahi</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection