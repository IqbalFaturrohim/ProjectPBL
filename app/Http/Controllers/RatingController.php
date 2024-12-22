<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();  // Mengambil semua data artikel dari database
        return view('dashboard', compact('articles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'article_id' => 'required|exists:articles,id',
        ]);

        Rating::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'article_id' => $request->article_id,
        ]);

        return redirect()->back()->with('success', 'Rating berhasil ditambahkan!');
    }

}
