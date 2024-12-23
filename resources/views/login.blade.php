@extends('layouts.layout')
@section('title', 'Halaman Login')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center text-center text-white h-100">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

            <form action="{{ route('login') }}" method="POST" class="text-start bg-light text-dark p-5 rounded" style="width: 50%; min-height: 300px;">
                @csrf
                <h2 class="text-center mb-4">Login Admin</h2>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="javascript:history.back()" class="btn btn-secondary">Batal</a>
                </div>
            </form>
    </div>
@endsection

