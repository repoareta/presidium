<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'nama',
        'ttl',
        'alamat',
        'no_hp',
        'email',
        'pekerjaan',
        'perusahaan',
    ];

    protected $table = 'alumni';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
