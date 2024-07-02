<?php

namespace App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accommodation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'destination_id',
        'name'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
