<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'image_url',
        'name',
        'description',
        'location',
        'gmaps_url',
        'views',
        'start_date',
        'end_date',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
