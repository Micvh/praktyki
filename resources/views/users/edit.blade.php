<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edytuj użytkownika</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
body {
    font-family: Arial, sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    padding-top: 50px;
}
.container {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 400px;
}
h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}
label {
    display: block;
    margin-top: 10px;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}
input[type="text"], input[type="email"], input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
button {
    width: 100%;
    margin-top: 15px;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background-color: #1dacff;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}
button:hover {
    background-color: #1a9de8;
}
</style>
</head>
<body>
<div class="container">
    <h2>Edytuj użytkownika</h2>

    @if ($errors->any())
        <div style="color:red; margin-bottom:10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Login:</label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

        <label>Imię:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

        <label>Nazwisko:</label>
        <input type="text" name="secondname" value="{{ old('secondname', $user->secondname) }}">

        <label>Numer telefonu:</label>
        <input type="text" name="phoneNumber" value="{{ old('phoneNumber', $user->phoneNumber) }}">

        <label>Hasło (jeśli chcesz zmienić):</label>
        <input type="password" name="password" placeholder="Nowe hasło">

        <button type="submit">Zaktualizuj użytkownika</button>
    </form>
</div>
</body>
</html>
