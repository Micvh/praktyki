<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
        
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f4f6; 
            font-family: Arial, sans-serif;
        }
        a{
            text-decoration: none;
        }
     
        .dashboard-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            background-color:  #1dacff; 
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
                .log {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            background-color:  red; 
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
                       .edit {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            background-color:  lightgreen; 
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #1dacff;
        }

        form {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Panel główny</h1>

        <a href="{{ route('offerts.create') }}">
            <button class="btn">Dodaj ofertę</button>
        </a>
        
        <a href="{{ route('users.create') }}">
            <button class="btn">Dodaj użytkownika</button>
        </a>
        
        <a href="{{ route('offerts.index') }}">
            <button class="edit">Edytuj Oferte</button>
        </a>
        
        <a href="{{ route('users.index') }}">
            <button class="edit">Edytuj użytkownika</button>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="log">Wyloguj</button>
        </form>
    </div>
</body>
</html>