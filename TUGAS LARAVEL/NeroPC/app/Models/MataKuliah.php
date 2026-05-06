<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = ['kode', 'nama_mk', 'sks'];

    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'krs')
            ->withPivot('nilai')
            ->withTimestamps();
    }
}
