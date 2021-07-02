<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    protected $table = 'kelas';

    public function alumni()
    {
        return $this->hasMany(Alumni::class, 'kelas_id', 'id');
    }
}
