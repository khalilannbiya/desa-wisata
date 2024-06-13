<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
