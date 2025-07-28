<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    // Method untuk halaman Beranda (statis)
    public function home(): View
    {
        return view('pages.home');
    }

    // Method untuk halaman Tentang Kami (statis)
    public function about(): View
    {
        return view('pages.about');
    }

    // Method untuk halaman Area Praktik (statis)
    public function services(): View
    {
        return view('pages.services');
    }

    // Method untuk halaman Tim (dinamis)
    public function team(): View
    {
        // Ambil semua data tim dari database
        $teamMembers = Team::orderBy('created_at', 'asc')->get();

        // Kirim data ke view
        return view('pages.team', [
            'teamMembers' => $teamMembers
        ]);
    }

    // Method untuk halaman Artikel (dinamis)
    public function articles(): View
    {
        // Ambil 6 artikel terbaru per halaman dan kirim ke view
        $articles = Article::latest()->paginate(6);

        // Kirim data ke view
        return view('pages.articles', [
            'articles' => $articles
        ]);
    }
}