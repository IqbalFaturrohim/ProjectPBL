<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::with('ratings')->get();
        return view('dashboard', compact('articles'));
    }

    public function showArticles()
    {
        $articles = Article::all();
        return view('artikel', compact('articles'));
    }

    public function showDetailArticles($id)
    {
        $detailArticles = Article::findOrFail($id);
        return view('detail_artikel', compact('detailArticles'));
    }

  
    public function create()
    {
        return view('create_artikel');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sejarah' => 'required|string',
        ]);

        $gambarPath = $request->file('gambar')->store('images', 'public');

        Article::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'sejarah' => $request->sejarah,
        ]);

        return redirect()->route('dashboard')->with('success', 'Artikel berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('edit_artikel', compact('article'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'sejarah' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $article = Article::findOrFail($id);
    
        $article->judul = $request->judul;
        $article->deskripsi = $request->deskripsi;
        $article->sejarah = $request->sejarah;
    
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'public');
            $article->gambar = $imagePath;
        }
    
        $article->save();
    
        return redirect()->route('dashboard')->with('success', 'Artikel berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->gambar && \Storage::exists('public/' . $article->gambar)) {
            \Storage::delete('public/' . $article->gambar);
        }

        $article->delete();

        return redirect()->route('dashboard')->with('success', 'Artikel berhasil dihapus.');
    }

}

