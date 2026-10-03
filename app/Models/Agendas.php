<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendas extends Model
{
    use HasFactory;

    // Memaksa model ini menggunakan tabel bernama 'agenda' (tanpa 's') 
    // atau sesuaikan dengan nama tabel yang ada di database Abang
    protected $table = 'agendas'; 
}