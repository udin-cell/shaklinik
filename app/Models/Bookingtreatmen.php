<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookingtreatmen extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'kode',
        'nama_pemesan',
        'no_hp',
        'alamat',
        'jam_janji',
        'tgl_janji',
        'total_price',
        'payment_url',
        'payment',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(BookingtreatmenItem::class, 'bookingtreatmens_id', 'id');
    }
}
