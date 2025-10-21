<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'oferty';
    public $timestamps = false;
    protected $fillable = [
        'numer','tytul','opis','lokalizacja','cena','metraz','telefon','agent','zdjecia'
    ];
}