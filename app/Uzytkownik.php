<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uzytkownik extends Model
{
    protected $table = 'uzytkownicy';
    public $timestamps = false;
    protected $fillable = ['username', 'password'];
}
