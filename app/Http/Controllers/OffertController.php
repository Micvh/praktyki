<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offert;

class OffertController extends Controller
{
    // Formularz tworzenia oferty
    public function create()
    {
        return view('offerts.create');
    }

    // Zapis nowej oferty
    public function store(Request $request)
    {
        $validated = $request->validate([
            'OffertNumber' => 'required|string|unique:offerts',
            'OffertDescription' => 'required|string',
            'OffertSize' => 'nullable|string',
            'AgentName' => 'required|string',
            'AgentPhone' => 'nullable|string',
            'Photos.*' => 'nullable|image|max:2048', // max 2MB na zdjęcie
            'OffertType' => 'nullable|array',       // checkboxy
        ]);

        // Obsługa checkboxów jako JSON
        $validated['OffertType'] = $validated['OffertType'] ?? [];

        // Obsługa uploadu zdjęć
        if ($request->hasFile('Photos')) {
            $photos = [];
            foreach ($request->file('Photos') as $photo) {
                $photos[] = $photo->store('offerts', 'public');
            }
            $validated['Photos'] = $photos;
        } else {
            $validated['Photos'] = [];
        }

        Offert::create($validated);

        return redirect()->route('dashboard')->with('success', 'Oferta została dodana!');
    }

    // Wyświetlenie wszystkich ofert
    public function index()
    {
        $offerts = Offert::all();
        return view('offerts.index', compact('offerts'));
    }

    // Wyświetlenie pojedynczej oferty
    public function show($id)
    {
        $offert = Offert::findOrFail($id);
        return view('offerts.show', compact('offert'));
    }

    // Formularz edycji
    public function edit($id)
    {
        $offert = Offert::findOrFail($id);
        return view('offerts.edit', compact('offert'));
    }

    // Aktualizacja
    public function update(Request $request, $id)
    {
        $offert = Offert::findOrFail($id);

        $data = $request->validate([
            'OffertNumber' => 'required|string|unique:offerts,OffertNumber,'.$offert->id,
            'OffertDescription' => 'required|string',
            'OffertSize' => 'nullable|string',
            'AgentName' => 'required|string',
            'AgentPhone' => 'nullable|string',
            'Photos.*' => 'nullable|image|max:2048',
            'OffertType' => 'nullable|array',
        ]);

        $data['OffertType'] = $data['OffertType'] ?? [];

        if ($request->hasFile('Photos')) {
            $photos = [];
            foreach ($request->file('Photos') as $photo) {
                $photos[] = $photo->store('offerts', 'public');
            }
            $data['Photos'] = $photos;
        }

        $offert->update($data);

        return redirect()->route('dashboard')->with('success', 'Oferta została zaktualizowana!');
    }

    // Usuwanie oferty
    public function destroy($id)
    {
        $offert = Offert::findOrFail($id);
        $offert->delete();

        return redirect()->route('dashboard')->with('success', 'Oferta została usunięta!');
    }
}