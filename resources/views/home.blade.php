@extends('layouts.layout')
@section('title', 'Halaman Utama')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center text-center text-white min-vh-100">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-dark bg-opacity-50 p-5 rounded">
            <h1 class="fw-bold">SELAMAT DATANG</h1>
            <p class="fs-4">Website Pengenalan Objek Wisata Goa Gajah</p>
            <a href="{{ route('artikel') }}" class="btn btn-light btn-lg">Jelajahi!</a>
        </div>
    </div>
@endsection
