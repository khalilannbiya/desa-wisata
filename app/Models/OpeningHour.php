<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'destination_id',
        'day',
        'open',
        'close',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
