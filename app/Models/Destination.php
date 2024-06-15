<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContactDetail;
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

    public function openingHours()
    {
        return $this->hasMany(OpeningHour::class, 'destination_id');
    }

    public function contactDetails()
    {
        return $this->hasMany(ContactDetail::class, 'destination_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'destination_id');
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class, 'destination_id');
    }

    public function accomodations()
    {
        return $this->hasMany(Accomodation::class, 'destination_id');
    }
}
