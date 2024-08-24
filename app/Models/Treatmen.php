<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Treatmen extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kode', 'foto', 'nama_jasa', 'bagians_id', 'deskripsi', 'jenis', 'tarif',
    ];

    public function bagian()
    {
        return $this->belongsTo(Categorytreatmen::class, 'bagians_id', 'id');
    }
    public function getFotoAttribute($foto)
    {
        return config('app.url') . Storage::url($foto);
    }
}
