<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarTunggu extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'no_urut',  'kode_jadwal', 'dokter_id', 'users_id', 'treatmen_id', 'jam', 'tgl', 'jumlah',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function treatmen()
    {
        return $this->belongsTo(Treatmen::class, 'treatmen_id', 'id');
    }
}
