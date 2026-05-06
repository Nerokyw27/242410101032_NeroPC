<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'jurusan',
        'ipk',
        'semester',
        'aktif',
        'foto',
    ];

    protected $casts = [
        'ipk'   => 'decimal:2',
        'aktif' => 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function mataKuliahs()
    {
        return $this->belongsToMany(MataKuliah::class, 'krs')
                ->withPivot('nilai')
                ->withTimestamps();
    }

}