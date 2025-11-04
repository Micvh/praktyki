<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj ofertę</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; margin:0; padding:0; font-family:Arial,sans-serif; }
        
        body { 
            display:flex; 
            justify-content:center; 
            align-items:flex-start; 
            min-height:100vh; 
            background:#f0f2f5; 
            padding-top:50px; 
        }

        .form-container { 
            margin-top:40px; 
            background:#fff; 
            padding:30px 40px; 
            border-radius:8px; 
            box-shadow:0 4px 8px rgba(0,0,0,0.1); 
            width:400px; 
        }

        h2 { 
            text-align:center; 
            margin-bottom:20px; 
            color:#333; 
        }

        label { 
            display:block; 
            margin-top:10px; 
            margin-bottom:5px; 
            font-weight:bold; 
            color:#555; 
        }

        input[type="text"], 
        textarea, 
        input[type="file"], 
        select { 
            width:100%; 
            padding:10px; 
            border:1px solid #ccc; 
            border-radius:5px; 
        }

        textarea { 
            height:80px; 
            resize:vertical; 
        }

        #dodaj { 
            width:100%; 
            margin-top:15px; 
            padding:12px; 
            border:none; 
            border-radius:5px; 
            background-color:#1dacff; 
            color:white; 
            font-weight:bold; 
            cursor:pointer; 
            transition:0.3s; 
        }

        #dodaj:hover { 
            background-color:#1a9de8; 
        }

        .error-list { 
            color:red; 
            margin-bottom:10px; 
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Dodaj ofertę</h2>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('offerts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Numer oferty:</label>
            <input type="text" name="number" required>

            <label>Opis oferty:</label>
            <textarea name="description" required></textarea>

            <label>Rozmiar mieszkania:</label>
            <input type="text" name="size">

            <label>Imię agenta:</label>
            <input type="text" name="agent_name" required>

            <label>Telefon agenta:</label>
            <input type="text" name="agent_phone">

            <label>Typ oferty:</label>
            <select name="type" required>
                <option value="">-- Wybierz typ oferty --</option>
                <option value="Wynajem">Wynajem</option>
                <option value="Sprzedaż">Sprzedaż</option>
                <option value="Dzierżawa">Dzierżawa</option>
            </select>

            <label>Zdjęcia:</label>
            <input type="file" name="photos[]" multiple>

            <button type="submit" id="dodaj">Dodaj ofertę</button>
        </form>
    </div>
</body>
</html>
