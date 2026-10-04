<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpdbApplicant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'wave_id',
        'major_id',
        'registration_number',
        'full_name',
        'nisn',
        'nik',
        'gender',
        'birth_place',
        'birth_date',
        'religion',
        'address',
        'phone',
        'email',
        'origin_school',
        'parent_name',
        'parent_phone',
        'parent_job',
        'document_kk',
        'document_ijazah',
        'document_akta',
        'document_photo',
        'status',
        'verification_notes',
        'verified_by',
        'verified_at',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($applicant) {
            if (empty($applicant->registration_number)) {
                $year = date('Y');
                $prefix = "PPDB-{$year}-";

                // Gunakan withTrashed agar soft-deleted juga dihitung
                $last = static::withTrashed()
                    ->where('registration_number', 'like', $prefix.'%')
                    ->max('registration_number');

                if ($last) {
                    $lastNumber = (int) substr($last, strlen($prefix));
                    $next = $lastNumber + 1;
                } else {
                    $next = 1;
                }

                // Pastikan nomor benar-benar unik (loop jika ternyata sudah ada)
                do {
                    $number = sprintf('%s%04d', $prefix, $next);
                    $exists = static::withTrashed()->where('registration_number', $number)->exists();
                    if ($exists) {
                        $next++;
                    }
                } while ($exists);

                $applicant->registration_number = $number;
            }
        });
    }

    public function wave()
    {
        return $this->belongsTo(PpdbWave::class, 'wave_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('registration_number', 'like', "%{$search}%")
                    ->orWhere('nisn', 'like', "%{$search}%")
                    ->orWhere('origin_school', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        return $query;
    }

    public function getDocumentUrl(string $column): ?string
    {
        $val = $this->{$column};
        if (! $val) {
            return null;
        }
        if (str_starts_with($val, 'http')) {
            return $val;
        }

        return asset('storage/'.$val);
    }

    public function getStatusBadgeAttribute(): array
    {
        return match ($this->status) {
            'menunggu' => ['bg' => 'bg-amber-500/20', 'text' => 'text-amber-400', 'border' => 'border-amber-500/30', 'label' => 'Menunggu Verifikasi'],
            'diverifikasi' => ['bg' => 'bg-blue-500/20', 'text' => 'text-blue-400', 'border' => 'border-blue-500/30', 'label' => 'Diverifikasi'],
            'diterima' => ['bg' => 'bg-emerald-500/20', 'text' => 'text-emerald-400', 'border' => 'border-emerald-500/30', 'label' => 'Diterima'],
            'ditolak' => ['bg' => 'bg-rose-500/20', 'text' => 'text-rose-400', 'border' => 'border-rose-500/30', 'label' => 'Ditolak'],
            'cadangan' => ['bg' => 'bg-purple-500/20', 'text' => 'text-purple-400', 'border' => 'border-purple-500/30', 'label' => 'Cadangan'],
            default => ['bg' => 'bg-slate-500/20', 'text' => 'text-slate-400', 'border' => 'border-slate-500/30', 'label' => ucfirst($this->status)],
        };
    }
}
