<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function services(): View
    {
        return view('pages.services');
    }

    public function team(): View
    {
        $teamMembers = Team::orderBy('created_at', 'asc')->get();
        return view('pages.team', ['teamMembers' => $teamMembers]);
    }

    public function articles(): View
    {
        $articles = Article::latest()->paginate(6);
        return view('pages.articles', ['articles' => $articles]);
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function showPredictionForm(): View
    {
        return view('pages.predict_form');
    }

    public function submitContactForm(Request $request)
    {
        // 1. Validasi input form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 2. Simpan data ke database
        $contact = Contact::create($validated);

        // 3. Kirim email notifikasi
        Mail::to('danadyaksalawfirm@gmail.com')->send(new ContactFormSubmitted($contact));

        // 4. Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Thank you for your message! We will get back to you shortly.');
    }
}
