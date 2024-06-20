<?php

namespace App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'destination_id',
        'phone',
        'email',
        'social_media'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
