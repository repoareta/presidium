<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienCovid extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'nama',
        'kelas_id',
        'jenkel',
        'goldar',
        'rhesus',
        'kota',
        'kondisi',
        'support',
        'emergency_number',
    ];

    protected $table = 'pasien_covid';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    
    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
}
