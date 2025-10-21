<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UzytkownikDodanie extends Model
{
    protected $table = 'uzytkownicy'; 
    public $timestamps = false;  
    protected $fillable = [
        'username', 'password', 'imie', 'nazwisko', 'email'
    ];
}
