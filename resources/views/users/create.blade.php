<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj użytkownika</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 15px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #1dacff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0d8fd8;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #1dacff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Dodaj użytkownika</h1>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <input type="text" name="username" placeholder="Nazwa użytkownika" required>
            <input type="password" name="password" placeholder="Hasło" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="name" placeholder="Imię" required>
            <input type="text" name="secondname" placeholder="Nazwisko">
            <input type="text" name="phoneNumber" placeholder="Numer telefonu">

            <button type="submit">Zapisz użytkownika</button>
        </form>

        <a href="{{ route('dashboard') }}">⬅ Powrót do panelu</a>
    </div>
</body>
</html>
