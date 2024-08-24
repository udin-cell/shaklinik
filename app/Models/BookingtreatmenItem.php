<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingtreatmenItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'treatments_id', 'bookingtreatmens_id', 'quantity'
    ];

    public function treatmen()
    {
        return $this->hasOne(Treatmen::class, 'id', 'treatments_id');
    }
}
