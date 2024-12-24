@extends('layouts.layout')

@section('title', 'Tambah Artikel')

@section('content')
<div class="container mt-5 pt-3">
    <h1 class="my-4">Tambah Artikel</h1>

    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah</label>
            <textarea name="sejarah" id="sejarah" class="form-control" required></textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan Artikel</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
