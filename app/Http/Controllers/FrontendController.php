<?php

namespace App\Http\Controllers;

use App\Models\Agendas;
use App\Models\Contact;
use App\Models\Extracurricular;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index(): View
    {
        $posts = Post::latest()->take(3)->get();
        $agenda = Agendas::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();
        $headmaster = Staff::where('position', 'LIKE', '%Kepala Sekolah%')->first();

        return view('frontend.home', compact('posts', 'agenda', 'headmaster'));
    }

    public function profile(): View
    {
        $staffs = Staff::latest()->get();
        
        return view('frontend.profile', compact('staffs'));
    }

    public function facilities(): View
    {
        $fasilitas = Facility::latest()->get();
        
        return view('frontend.facilities', compact('fasilitas'));
    }

    public function galleries(): View
    {
        $galleries = Gallery::latest()->paginate(12);
        
        return view('frontend.galleries', compact('galleries'));
    }

    public function contact(): View
    {
        return view('frontend.contact');
    }

    public function storeContact(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim! Kami akan segera menghubungi Anda kembali.');
    }

    public function extracurriculars(): View
    {
        $extracurriculars = Extracurricular::all();
        
        return view('frontend.extracurriculars', compact('extracurriculars'));
    }
}