<?php

namespace App\Models;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'location',
        'price_range',
        'status',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
