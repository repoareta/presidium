<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKesehatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'profesi',
        'ket_profesi',
        'kota',
        'provinsi',
        'instansi',
    ];

    protected $table = 'tenaga_kesehatan';
}
