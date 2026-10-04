<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\PpdbApplicant;
use App\Models\PpdbWave;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PpdbController extends Controller
{
    public function index(): View
    {
        $activeWave = PpdbWave::where('is_active', true)
            ->where('start_date', '<=', now()->toDateString())
            ->where('end_date', '>=', now()->toDateString())
            ->first();

        $majors = Major::orderBy('order')->get();

        return view('frontend.ppdb', compact('activeWave', 'majors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'wave_id' => 'required|exists:ppdb_waves,id',
            'major_id' => 'nullable|exists:majors,id',
            'full_name' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:20',
            'nik' => 'nullable|string|max:20',
            'gender' => 'required|in:L,P',
            'birth_place' => 'nullable|string|max:100',
            'birth_date' => 'nullable|date',
            'religion' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'origin_school' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:30',
            'parent_job' => 'nullable|string|max:100',
        ]);

        $validatedData['status'] = 'menunggu';

        $applicant = PpdbApplicant::create($validatedData);

        return redirect()
            ->route('ppdb.success', ['number' => $applicant->registration_number])
            ->with('success', 'Pendaftaran PPDB berhasil! Nomor pendaftaran Anda: '.$applicant->registration_number);
    }

    public function success(Request $request): View
    {
        $registrationNumber = $request->query('number');

        return view('frontend.ppdb-success', compact('registrationNumber'));
    }
}
