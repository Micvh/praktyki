<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edytuj ofertę</title>
<style>
    body { 
    font-family: Arial; 
    background: #f0f2f5; 
    display: flex; 
    justify-content: center; 
    padding-top: 50px; 
}
    .form-container {
     background: #fff; 
     padding: 30px; 
     border-radius: 8px; 
     width: 400px; 
     box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
    }
    label { 
    display:block; 
    margin-top:10px; 
    font-weight:bold; 
}
    input, textarea { 
    width:100%; 
    padding:10px; 
    margin-top:5px; 
    border:1px solid #ccc; 
    border-radius:5px; 
}
    button { 
    margin-top:15px; 
    width:100%; 
    padding:12px; 
    border:none; 
    border-radius:5px; 
    background:#1dacff; 
    color:white; 
    font-weight:bold; 
    cursor:pointer; 
    }
</style>
</head>
<body>

<div class="form-container">
    <h2>Edytuj ofertę</h2>



    <form action="{{ route('offerts.update', $offert) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Numer oferty:</label>
        <input type="text" name="number" value="{{ old('number', $offert->number) }}" required>

        <label>Opis oferty:</label>
        <textarea name="description" required>{{ old('description', $offert->description) }}</textarea>

        <label>Rozmiar mieszkania (m²):</label>
        <input type="text" name="size" value="{{ old('size', $offert->size) }}">

        <label>Imię agenta:</label>
        <input type="text" name="agent_name" value="{{ old('agent_name', $offert->agent_name) }}" required>

        <label>Telefon agenta:</label>
        <input type="text" name="agent_phone" value="{{ old('agent_phone', $offert->agent_phone) }}">

        <label>Typ oferty:</label>
        <select name="type" required>
            <option value="">-- wybierz typ --</option>
            <option value="Wynajem" {{ old('type', $offert->type) == 'Wynajem' ? 'selected' : '' }}>Wynajem</option>
            <option value="Sprzedaż" {{ old('type', $offert->type) == 'Sprzedaż' ? 'selected' : '' }}>Sprzedaż</option>
            <option value="Dzierżawa" {{ old('type', $offert->type) == 'Dzierżawa' ? 'selected' : '' }}>Dzierżawa</option>
        </select>

        <label>Zdjęcia (dodaj nowe):</label>
        <input type="file" name="photos[]" multiple>

        @if (!empty($offert->photos))
        <div class="photo-preview">
            @foreach ($offert->photos as $photo)
                <img src="{{ asset('storage/' . $photo) }}" alt="photo">
            @endforeach
        </div>
        @endif

        <button type="submit">Zaktualizuj ofertę</button>
    </form>
</div>

</body>
</html>