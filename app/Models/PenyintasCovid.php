<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyintasCovid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'jenkel',
        'goldar',
        'rhesus',
        'sembuh',
        'kota',
        'donor_plasma',
    ];

    protected $table = 'penyintas_covid';
}
