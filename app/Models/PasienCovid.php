<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienCovid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'jenkel',
        'goldar',
        'rhesus',
        'kota',
        'kondisi',
        'support',
    ];

    protected $table = 'pasien_covid';
}
