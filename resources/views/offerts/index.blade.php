<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista ofert</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #fafafa;
        margin: 40px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    th {
        background: #f0f0f0;
        text-transform: uppercase;
        font-weight: 600;
    }
    tr:nth-child(even) {
        background: #f9f9f9;
    }
    a, button {
        margin-right: 5px;
        padding: 6px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        color: #fff;
        font-size: 14px;
    }
    .edit { background: #28a745; }
    .delete { background: #dc3545; }
    .dashboard-btn, .add-btn {
        background: #007bff;
        display: inline-block;
        margin-bottom: 15px;
    }
    .btn-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    p.success {
        color: green;
        font-weight: bold;
    }
</style>
</head>
<body>

<h1>Lista ofert</h1>

<div class="btn-container">
    <a href="{{ route('dashboard') }}" class="dashboard-btn"> Panel główny</a>
    <a href="{{ route('offerts.create') }}" class="add-btn"> Dodaj nową ofertę</a>
</div>

@if(session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Numer</th>
            <th>Opis</th>
            <th>Rozmiar</th>
            <th>Agent</th>
            <th>Telefon</th>
            <th>Typ</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($offers as $offer)
        <tr>
            <td>{{ $offer->id }}</td>
            <td>{{ $offer->number }}</td>
            <td>{{ $offer->description }}</td>
            <td>{{ $offer->size }}</td>
            <td>{{ $offer->agent_name }}</td>
            <td>{{ $offer->agent_phone }}</td>
            <td>{{ $offer->type }}</td>
            <td>
                <a href="{{ route('offerts.edit', $offer) }}" class="edit">Edytuj</a>
                <form action="{{ route('offerts.destroy', $offer) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete" onclick="return confirm('Czy na pewno chcesz usunąć tę ofertę?')">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
