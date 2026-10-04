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
use App\Http\Controllers\PpdbController;

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

// PPDB – Pendaftaran Peserta Didik Baru
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');
Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/sukses', [PpdbController::class, 'success'])->name('ppdb.success');

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

    // Manajemen Galeri & Foto
    Route::patch('galleries/{gallery}/quick-rename', [AdminGalleryController::class, 'quickRename'])->name('galleries.quick-rename');
    Route::resource('galleries', AdminGalleryController::class);

    // Manajemen Aktivitas & Ekstrakurikuler
    Route::resource('extracurriculars', AdminExtracurricularController::class);

    // Manajemen Fasilitas
    Route::resource('facilities', AdminFacilityController::class);

    // Manajemen Staff & Guru
    Route::resource('staff', AdminStaffController::class);

    // Manajemen Pesan Masuk
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // =======================
    // MANAJEMEN PPDB
    // =======================
    // 1. Daftar Utama PPDB
    Route::get('ppdb', function () {
        $applicants = \App\Models\PpdbApplicant::latest()->paginate(15);
        $totalApplicants = \App\Models\PpdbApplicant::count();
        $pendingApplicants = \App\Models\PpdbApplicant::where('status', 'menunggu')->count();
        $verifiedApplicants = \App\Models\PpdbApplicant::where('status', 'diverifikasi')->count();
        $acceptedApplicants = \App\Models\PpdbApplicant::where('status', 'diterima')->count();
        return view('admin.ppdb.index', compact('applicants', 'totalApplicants', 'pendingApplicants', 'verifiedApplicants', 'acceptedApplicants'));
    })->name('ppdb.index');

    // 2. Gelombang PPDB (Wajib di atas {applicant})
    Route::get('ppdb/waves', function () {
        $waves = \App\Models\PpdbWave::latest()->get();
        return view('admin.ppdb.index', [
            'applicants' => \App\Models\PpdbApplicant::latest()->paginate(15), 
            'totalApplicants' => 0, 
            'pendingApplicants' => 0, 
            'verifiedApplicants' => 0, 
            'acceptedApplicants' => 0
        ]);
    })->name('ppdb.waves');

    // 3. Detail Pendaftar PPDB
    Route::get('ppdb/{applicant}', function ($id) {
        $applicant = \App\Models\PpdbApplicant::findOrFail($id);
        return view('admin.ppdb.show', compact('applicant'));
    })->name('ppdb.show');

    // 4. Update Status Pendaftar PPDB
    Route::patch('ppdb/{applicant}/status', function (\Illuminate\Http\Request $request, $id) {
        $applicant = \App\Models\PpdbApplicant::findOrFail($id);
        $applicant->update(['status' => $request->status]);
        return back()->with('success', 'Status pendaftar berhasil diperbarui.');
    })->name('ppdb.update-status');

    // 5. Hapus Pendaftar PPDB
    Route::delete('ppdb/{applicant}', function ($id) {
        $applicant = \App\Models\PpdbApplicant::findOrFail($id);
        $applicant->delete();
        return redirect()->route('admin.ppdb.index')->with('success', 'Data pendaftar berhasil dihapus.');
    })->name('ppdb.destroy');

    // =======================
    // MANAJEMEN USER
    // =======================
    // Index User
    Route::get('users', function () {
        $users = \App\Models\User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    // Form Tambah User
    Route::get('users/create', function () {
        return view('admin.users.create');
    })->name('users.create');

    // Simpan User Baru
    Route::post('users', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        \App\Models\User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    })->name('users.store');

    // Form Edit User
    Route::get('users/{user}/edit', function ($id) {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    })->name('users.edit');

    // Update User
    Route::put('users/{user}', function (\Illuminate\Http\Request $request, $id) {
        $user = \App\Models\User::findOrFail($id);
        
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $data = ['name' => $request->name, 'email' => $request->email];
        if ($request->filled('password')) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    })->name('users.update');

    // Hapus User
    Route::delete('users/{user}', function ($id) {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    })->name('users.destroy');

    // =======================
    // PENGATURAN WEBSITE
    // =======================
    // Tampilan Form Pengaturan
    Route::get('settings', function () {
        $settings = \App\Models\Setting::pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    })->name('settings.index');

    // Update / Simpan Pengaturan Website
    Route::post('settings', function (\Illuminate\Http\Request $request) {
        $data = $request->except('_token');
        
        foreach ($data as $key => $value) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan.');
    })->name('settings.update');
});