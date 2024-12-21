@extends('layouts.layout')
@section('title', 'Halaman Utama')

@section('content')
<div class="position-relative" style="background-image: url('{{ asset('img/image 1.png') }}'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center text-white h-100">
        <div class="bg-dark bg-opacity-50 p-5 rounded">
            <h1 class="fw-bold">SELAMAT DATANG</h1>
            <p class="fs-4">Website Pengenalan Objek Wisata Goa Gajah</p>
            <a href="#" class="btn btn-light btn-lg">Jelajahi!</a>
        </div>
    </div>
</div>
@endsection