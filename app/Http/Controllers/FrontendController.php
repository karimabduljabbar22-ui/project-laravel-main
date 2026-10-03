<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Agendas;
use App\Models\Staff;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Extracurricular;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $agenda = Agendas::orderBy('event_date', 'asc')->take(3)->get();
        $headmaster = Staff::where('position', 'LIKE', '%Kepala Sekolah%')->first();

        return view('frontend.home', compact('posts', 'agenda', 'headmaster'));
    }

    public function profile()
    {
        $staffs = Staff::all();
        return view('frontend.profile', compact('staffs'));
    }

    public function facilities()
    {
        $fasilitas = Facility::all();
        return view('frontend.facilities', compact('fasilitas'));
    }

    public function galleries()
    {
        $galleries = Gallery::all();
        return view('frontend.galleries', compact('galleries'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim! Kami akan segera menghubungi Anda kembali.');
    }

    public function extracurriculars()
    {
        $extracurriculars = Extracurricular::all();
        return view('frontend.extracurriculars', compact('extracurriculars'));
    }
}