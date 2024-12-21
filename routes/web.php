<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/detail_artikel', function () {
    return view('detail_artikel');
});
