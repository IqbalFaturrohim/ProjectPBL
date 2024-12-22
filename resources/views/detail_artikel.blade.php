@extends('layouts.layout')

@section('title', 'Detail Artikel')

@section('content')
<div class="container-fluid p-0" style="background: url('{{ asset('img/image 1.png') }}') no-repeat center center; background-size: cover;">
    <div class="container py-5">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Kartu Deskripsi Artikel -->
        <div class="card p-3 shadow">
            <div class="d-flex justify-content-start">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $detailArticles->gambar)}}" class="img-fluid rounded-start" alt="{{ $detailArticles->judul }}">
                    </div>
    
                    <!-- Card Body with Title, Description, and Button -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $detailArticles->judul }}</h5> <!-- Align title to the left -->
                            <p class="card-text" style="margin-bottom: 20px;"> <!-- Align text to the left -->
                                {{ $detailArticles->sejarah }}
                            </p>
                            <div class="text-start mt-2"> <!-- Align button to the left -->
                                <a href="{{ route('artikel') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Beri Rating -->
        <div class="mt-4 w-100">
            <div class="bg-opacity-25 text-white py-2 d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratingModal">
                    Beri Rating
                </button>
            </div>
        </div>

        <!-- Daftar Rating -->
        <div class="card mb-3 shadow mt-3">
            <div class="card-body">
                <h5 class="card-title">Daftar Rating</h5>
                <div class="rating-container" style="max-height: 300px; overflow-y: auto;">
                    @if($detailArticles->ratings->count())
                        @foreach($detailArticles->ratings as $rating)
                        <div class="rating-item mb-3">
                            <h6 class="card-title">{{ $rating->name }}</h6>
                            <p class="text-warning mb-1">
                                {!! str_repeat('★', $rating->rating) . str_repeat('☆', 5 - $rating->rating) !!}
                            </p>
                            <p class="card-text">{{ $rating->comment }}</p>
                        </div>
                        @endforeach
                    @else
                        <p class="text-center">Belum ada rating untuk artikel ini.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Beri Rating -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Beri Rating</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rating.store') }}" method="POST">
                    {{-- {{ route('rating.store') }} --}}
                    @csrf 

                    <input type="hidden" name="article_id" value="{{ $detailArticles->id }}">

                    <!-- Form Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <!-- Form Rating -->
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" id="rating" name="rating" required>
                            <option value="5">★★★★★</option>
                            <option value="4">★★★★☆</option>
                            <option value="3">★★★☆☆</option>
                            <option value="2">★★☆☆☆</option>
                            <option value="1">★☆☆☆☆</option>
                        </select>
                    </div>
                    <!-- Form Komentar -->
                    <div class="mb-3">
                        <label for="comment" class="form-label">Komentar</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>
                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection