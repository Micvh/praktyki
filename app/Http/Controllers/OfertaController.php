<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Oferta;
use Illuminate\Support\Facades\Validator;

class OfertaController extends BaseController
{
    public function dodaj(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numer' => 'required|string|max:255',
            'tytul' => 'required|string|max:255',
            'opis' => 'required|string',
            'lokalizacja' => 'required|string|max:255',
            'cena' => 'required|numeric',
            'metraz' => 'required|numeric',
            'telefon' => 'required|string|max:50',
            'agent' => 'required|string|max:255',
            'zdjecia.*' => 'file|mimes:jpg,jpeg,png,gif|max:10240' 
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
$zdjecia_nazwy = []; 
if ($request->hasFile('zdjecia')) 
  { foreach ($request->file('zdjecia') as $plik) 
    { if ($plik->isValid()) {
       $nazwa = $plik->getClientOriginalName(); 
       $zdjecia_nazwy[] = $nazwa; } } } 
        $oferta = Oferta::create([
            'numer' => $request->input('numer'),
            'tytul' => $request->input('tytul'),
            'opis' => $request->input('opis'),
            'lokalizacja' => $request->input('lokalizacja'),
            'cena' => $request->input('cena'),
            'metraz' => $request->input('metraz'),
            'telefon' => $request->input('telefon'),
            'agent' => $request->input('agent'),
            'zdjecia' => json_encode($zdjecia_nazwy)
        ]);
if ($request->ajax() || $request->wantsJson()) {
    return response()->json([
        'data' => $oferta
    ]);
}
return redirect('/dodanie');
    }
}
