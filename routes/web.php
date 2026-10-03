<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\StaffController as AdminStaffController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminExtracurricularController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

/*
|--------------------------------------------------------------------------
| Web Routes - Portal Sekolah
|--------------------------------------------------------------------------
*/

// =======================
// HALAMAN PUBLIK / PORTAL
// =======================
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/profil', [FrontendController::class, 'profile'])->name('profile');
Route::get('/fasilitas', [FrontendController::class, 'facilities'])->name('facilities');
Route::get('/galeri', [FrontendController::class, 'galleries'])->name('galleries');
Route::get('/ekstrakurikuler', [FrontendController::class, 'extracurriculars'])->name('extracurriculars');
Route::get('/kontak', [FrontendController::class, 'contact'])->name('contact');
Route::post('/kontak', [FrontendController::class, 'storeContact'])->name('contact.store');

// =======================
// AUTENTIKASI ADMIN (LOGIN & LOGOUT)
// =======================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// =======================
// PANEL ADMIN (TERPROTEKSI LOGIN)
// =======================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    
    // Logout Admin
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard Utama
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Berita & Artikel
    Route::resource('posts', AdminPostController::class);

    // Manajemen Galeri & Foto (dengan fitur Cepat Ubah Nama Gambar)
    Route::patch('galleries/{gallery}/quick-rename', [AdminGalleryController::class, 'quickRename'])->name('galleries.quick-rename');
    Route::resource('galleries', AdminGalleryController::class);

    // Manajemen Aktivitas & Ekstrakurikuler (Tambah Aktivitas + Gambar)
    Route::resource('extracurriculars', AdminExtracurricularController::class);

    // Manajemen Fasilitas
    Route::resource('facilities', AdminFacilityController::class);

    // Manajemen Staff & Guru
    Route::resource('staff', AdminStaffController::class);

    // Manajemen Pesan Masuk
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // PPDB
    Route::get('ppdb', function () {
        $applicants = \App\Models\PpdbApplicant::latest()->paginate(15);
        $totalApplicants = \App\Models\PpdbApplicant::count();
        $pendingApplicants = \App\Models\PpdbApplicant::where('status', 'menunggu')->count();
        $verifiedApplicants = \App\Models\PpdbApplicant::where('status', 'diverifikasi')->count();
        $acceptedApplicants = \App\Models\PpdbApplicant::where('status', 'diterima')->count();
        return view('admin.ppdb.index', compact('applicants', 'totalApplicants', 'pendingApplicants', 'verifiedApplicants', 'acceptedApplicants'));
    })->name('ppdb.index');

    Route::get('ppdb/waves', function () {
        $waves = \App\Models\PpdbWave::latest()->get();
        return view('admin.ppdb.index', ['applicants' => \App\Models\PpdbApplicant::latest()->paginate(15), 'totalApplicants' => 0, 'pendingApplicants' => 0, 'verifiedApplicants' => 0, 'acceptedApplicants' => 0]);
    })->name('ppdb.waves');

    // Manajemen User
    Route::get('users', function () {
        $users = \App\Models\User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    // Pengaturan Website
    Route::get('settings', function () {
        $settings = \App\Models\Setting::pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    })->name('settings.index');
});