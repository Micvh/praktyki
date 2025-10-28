<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    background: #f7f7f7;
    font-family: Arial, sans-serif;
}

h1 {
    margin-bottom: 20px;
    color: #333;
}

form {
    text-align: center;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 300px;
}

label {
    text-align: center;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
   
}

button {
    width: 100%;
    margin-top: 15px;
    background-color: #1dacff;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #1dacff;
}

h2 {
    color: #333;
    font-family: Arial, sans-serif;
}

a {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
    <div >
     
        @if($errors->any())
            <div >
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" >
            @csrf
            <div>
                <label >Uzytkownik</label>
                <br>
                <input type="text" name="username"  required>
            </div>

            <div >
                <label >Hasło</label>
                <br>
                <input type="password" name="password"  required >
          

            <button type="submit">Login</button>
              </div>
        </form>
    </div>
</body>
</html>