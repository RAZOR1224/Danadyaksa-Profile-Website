<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;   // <-- Diperbarui
use App\Http\Requests\UpdateArticleRequest;  // <-- Diperbarui
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $articles = Article::with('user')->latest()->paginate(10);

    // dd($articles); // <-- Hapus atau beri komentar pada baris ini

    return view('admin.articles.index', compact('articles'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request) // <-- Diperbarui
    {
        // Validasi sekarang ditangani secara otomatis oleh StoreArticleRequest
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        $request->user()->articles()->create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article) // <-- Diperbarui
    {
        // Validasi sekarang ditangani secara otomatis oleh UpdateArticleRequest
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // PERBAIKAN: Hanya hapus gambar jika ada DAN BUKAN file placeholder
        if ($article->image && $article->image !== 'articles/placeholder.png') {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }
}