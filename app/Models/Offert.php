<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offert extends Model
{
    use HasFactory;

    protected $fillable = [
        'OffertNumber',
        'OffertDescription',
        'OffertSize',
        'AgentName',
        'AgentPhone',
        'Photos',
        'OffertType',
    ];

    protected $casts = [
        'Photos' => 'array',
        'OffertType' => 'array',
    ];
}
