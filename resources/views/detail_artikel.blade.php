@extends('layouts.layout')

@section('title', 'Detail Artikel')

@section('content')
<div class="container-fluid p-0" style="background: url('{{ asset('img/image 1.png') }}') no-repeat center center; background-size: cover;">
    <div class="container py-5">
        <!-- Kartu Deskripsi Artikel -->
        <div class="card mb-4 p-3 shadow">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('img/image_dtl.png')}}" class="img-fluid rounded-start" alt="Goa Gajah Temple">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Goa Gajah Temple</h5>
                        <p class="card-text">
                            Goa Gajah adalah gua buatan dari masa purbakala yang berfungsi sebagai tempat ibadah.
                            Gua ini terletak di Desa Bedulu, Kecamatan Blahbatuh, Kabupaten Gianyar, Bali. Berjarak kurang lebih 27 km dari Denpasar, pertama kali disebut dalam karya sastra <a href="#">Kakawin Nagarakretagama</a> yang disusun oleh Mpu Prapanca (1365 M).
                            Nama tersebut tercantum dalam pupuh 14/3 yang menguraikan wilayah-wilayah di sebelah timur Jawa, yang mengakui kekuasaan <a href="#">Majapahit</a>.
                            Goa Gajah mengandung arti Sungai Gajah; kemungkinan sungai yang terletak di depan candi yang sekarang dikenal dengan nama <a href="#">Sungai Petanu</a>.
                        </p>
                        <div class="text-end">
                            <a href="#" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Beri Rating -->
         <!-- Rating Section -->
            <div class="mt-4 w-100">
                <div class="bg-opacity-25 text-white py-2 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratingModal">
                        Beri Rating
                    </button>
                </div>
            </div>

        <!-- Daftar Rating -->
        <div class="card mb-3 shadow mt-5">
            <div class="row g-0">
                <div class="col-md-10">
                    <div class="card-body">
                        <h6 class="card-title">Vanilla</h6>
                        <p class="text-warning mb-1">
                            ★★★★★
                        </p>
                        <p class="card-text">Sangat bagus, memukau</p>
                    </div>
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
                <form action="" method="POST">
                    {{-- {{ route('rating.store') }} --}}
                    @csrf
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
