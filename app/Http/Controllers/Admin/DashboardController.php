<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Extracurricular;
use App\Models\Contact;
use App\Models\User;
use App\Models\PpdbApplicant;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts' => Post::count(),
            'staff' => Staff::count(),
            'facilities' => Facility::count(),
            'galleries' => Gallery::count(),
            'extracurriculars' => Extracurricular::count(),
            'contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
            'users' => User::count(),
            'ppdb' => PpdbApplicant::count(),
        ];

        $recentPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts'));
    }
}
