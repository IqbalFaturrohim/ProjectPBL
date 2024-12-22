@extends('layouts.layout')
@section('title', 'Edit Artikel')

@section('content')
<div class="container mt-5 mb-5">
    <h2>Edit Artikel</h2>
    
    <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $article->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $article->deskripsi }}" required>
        </div>

        <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah</label>
            <textarea class="form-control" id="sejarah" name="sejarah" rows="5" required>{{ $article->sejarah }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (Opsional)</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            @if ($article->gambar)
                <p class="mt-2">Gambar Saat Ini:</p>
                <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Artikel" style="max-width: 200px;">
            @endif
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
