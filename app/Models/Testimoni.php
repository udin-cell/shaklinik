<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Testimoni extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id', 'product_id', 'treatmen_id', 'foto_before', 'foto_after', 'testimoni_text',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function treatmen()
    {
        return $this->belongsTo(Treatmen::class, 'treatmen_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }


    public function getFotoBeforeAttribute($foto_before)
    {
        return config('app.url') . Storage::url($foto_before);
    }

    public function getFotoAfterAttribute($foto_after)
    {
        return config('app.url') . Storage::url($foto_after);
    }
}
