<?php

namespace App\Models;

use App\Models\Gallery;
use App\Models\Facility;
use App\Models\OpeningHour;
use App\Models\Accommodation;
use App\Models\ContactDetail;
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
        'gmaps_url',
        'price_range',
        'status',
        'views',
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

    public function openingHours()
    {
        return $this->hasMany(OpeningHour::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }

    public function contactDetail()
    {
        return $this->hasOne(ContactDetail::class);
    }
}
