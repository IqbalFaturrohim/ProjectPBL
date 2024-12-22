@extends('layouts.layout')
@section('title', 'Halaman Artikel')

@section('content')
<div class="position-relative" style="background-image: url('{{ asset('img/image 1.png') }}'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <div class="container text-center text-white h-100">
        <div class="d-flex flex-column justify-content-center align-items-center h-100">
            <!-- Title -->
            <h1 class="fw-bold mb-5">Website Pengenalan Goa Gajah</h1>

            <!-- Card Section -->
            <div class="row justify-content-center g-lg-5">
                <!-- Card Template -->
                @foreach ($articles as $artikel)
                <div class="col-md-6"> <!-- Menggunakan col-md-6 untuk tata letak responsif -->
                    <div class="card border-0 shadow h-100">
                        <div class="p-3"> <!-- Wrapper dengan padding untuk memberikan jarak -->
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top rounded" alt="{{ $artikel->judul }}" style="object-fit: cover; max-height: 250px;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-truncate">{{ $artikel->judul }}</h5>
                            <p class="card-text text-truncate">{{ $artikel->deskripsi }}</p>
                            <a href="{{ route('detail-artikel', $artikel->id) }}" class="btn btn-success btn-sm mt-auto">Jelajahi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection