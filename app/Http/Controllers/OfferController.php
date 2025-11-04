<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function create()
    {
        return view('offerts.create');
    }

    public function index()
    {
        $offers = Offer::all();
        return view('offerts.index', compact('offers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|unique:offerts',
            'description' => 'required|string',
            'size' => 'nullable|string',
            'agent_name' => 'required|string',
            'agent_phone' => 'nullable|string',
            'type' => 'required|string|in:Wynajem,Sprzedaż,Dzierżawa',
            'photos.*' => 'nullable|image|max:2048',
        ]);

        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $uniqueName = Str::uuid() . '.' . $photo->getClientOriginalExtension();
                $photos[] = $photo->storeAs('offerts', $uniqueName, 'public');
            }
        }

        Offer::create([
            'number' => $validated['number'],
            'description' => $validated['description'],
            'size' => $validated['size'] ?? null,
            'agent_name' => $validated['agent_name'],
            'agent_phone' => $validated['agent_phone'] ?? null,
            'type' => $validated['type'],
            'photos' => $photos,
        ]);

        return redirect()->route('dashboard')->with('success', 'Oferta została dodana!');
    }

    public function edit(Offer $offert)
    {
        return view('offerts.edit', compact('offert'));
    }

    public function update(Request $request, Offer $offert)
    {
        $validated = $request->validate([
            'number' => 'required|string|unique:offerts,number,' . $offert->id,
            'description' => 'required|string',
            'size' => 'nullable|string',
            'agent_name' => 'required|string',
            'agent_phone' => 'nullable|string',
            'type' => 'required|string|in:Wynajem,Sprzedaż,Dzierżawa',
            'photos.*' => 'nullable|image|max:2048',
        ]);

        $existingPhotos = $offert->photos ?? [];

        if ($request->hasFile('photos')) {
            $newPhotos = [];
            foreach ($request->file('photos') as $photo) {
                $uniqueName = Str::uuid() . '.' . $photo->getClientOriginalExtension();
                $newPhotos[] = $photo->storeAs('offerts', $uniqueName, 'public');
            }

            foreach ($existingPhotos as $oldPhoto) {
                if (!in_array($oldPhoto, $newPhotos)) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }

            $offert->photos = $newPhotos;
        }

        $offert->update([
            'number' => $validated['number'],
            'description' => $validated['description'],
            'size' => $validated['size'] ?? null,
            'agent_name' => $validated['agent_name'],
            'agent_phone' => $validated['agent_phone'] ?? null,
            'type' => $validated['type'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Oferta została zaktualizowana!');
    }

    public function destroy(Offer $offert)
    {
        foreach ($offert->photos ?? [] as $photo) {
            Storage::disk('public')->delete($photo);
        }

        $offert->delete();

        return redirect()->route('dashboard')->with('success', 'Oferta została usunięta!');
    }

    public function showAll()
    {
        $offers = Offer::all()->toArray();
        dd($offers);
    }

}
