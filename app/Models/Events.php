<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'location',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
