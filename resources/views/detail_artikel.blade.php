@extends('layouts.layout')

@section('title', 'Detail Artikel')

@section('content')
    <div class="container py-5">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-6" 
                style="margin-top: 50px;" 
                role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card p-3 shadow mt-5">
            <div class="d-flex justify-content-start">
                <div class="row g-0">

                    <div class="col-md-3">
                        <img src="{{ asset('storage/' . $detailArticles->gambar)}}" class="img-fluid rounded-start" style="width: 250px" alt="{{ $detailArticles->judul }}">
                    </div>
    
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $detailArticles->judul }}</h5> 
                            <p class="card-text" style="text-align: justify">
                                {{ $detailArticles->sejarah }}
                            </p>
                            <div class="text-start mt-2"> 
                                <div class="text-end">
                                    <a href="{{ route('artikel') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 w-100">
            <div class="bg-opacity-25 text-white py-2 d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratingModal">
                    Beri Rating
                </button>
            </div>
        </div>

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

<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Beri Rating</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rating.store') }}" method="POST">
                    @csrf 
                    <input type="hidden" name="article_id" value="{{ $detailArticles->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
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

                    <div class="mb-3">
                        <label for="comment" class="form-label">Komentar</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
@endsection