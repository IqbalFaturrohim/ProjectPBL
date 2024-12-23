@extends('layouts.layout')
@section('title', 'Halaman Artikel')

@section('content')
    <div class="text-center text-white mt-xxl-5 pb-5 pt-1">

        <h1 class="fw-bold mb-5 mt-5">Website Pengenalan Goa Gajah</h1>

        <div class="row justify-content-center g-4">
            @foreach ($articles as $artikel)
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card border-0 shadow h-100" style="max-width: 18rem; margin: auto;">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top rounded" alt="{{ $artikel->judul }}" style="object-fit: cover; height: 150px;">
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
@endsection
