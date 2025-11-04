<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista użytkowników</title>
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
<h1>Lista użytkowników</h1>

<div class="btn-container">
    <a href="{{ route('dashboard') }}" class="dashboard-btn">Panel główny</a>
    <a href="{{ route('user.create') }}" class="add-btn"> Dodaj nowego uzytkownika</a>
</div>
@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<a href="{{ route('users.create') }}">Dodaj nowego użytkownika</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Telefon</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->secondname }}</td>
            <td>{{ $user->phoneNumber }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}" class="edit">Edytuj</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
