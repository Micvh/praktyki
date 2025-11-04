<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offerts';

    protected $fillable = [
        'number',
        'description',
        'size',
        'agent_name',
        'agent_phone',
        'type',      
        'photos',
    ];

    protected $casts = [
        'photos' => 'array',
    ];
}
