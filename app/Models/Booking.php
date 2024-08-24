<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{

    use HasFactory;

    protected $fillable = [
        'users_id', 'treatmens_id', 'quantity', 'total_harga'
    ];

    public function treatmen()
    {
        return $this->hasOne(Treatmen::class, 'id', 'treatmens_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
