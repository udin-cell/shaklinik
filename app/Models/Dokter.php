<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Dokter extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kode_dokter',
        'nama_dokter',
        'foto_dokter',
        'no_tlpn',
        'alamat',

    ];

    public function getFotoDokterAttribute($foto_dokter)
    {
        return config('app.url') . Storage::url($foto_dokter);
    }
}
