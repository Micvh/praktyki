<html >
<head>
    <link rel="stylesheet" href="/css/styleDodanie.css">
</head>
<body>

    <nav>
        <form method="GET" action="/logout">
            <button type="submit" class="navButton">Wyloguj</button>
        </form>
        <form method="GET" action="/main">
            <button type="submit" class="navButton">Panel główny</button>
        </form>
    </nav>

    <form id="form1" method="POST" action="/users/add">
        <h1>dodaj uzytkownika</h1>

        <label for="username">Login</label>
        <input type="text" id="username" name="username" required>

        <label for="password">hasloo</label>
        <input type="password" id="password" name="password" required>

        <label for="imie">imie</label>
        <input type="text" id="imie" name="imie" required>

        <label for="nazwisko">nazwisko</label>
        <input type="text" id="nazwisko" name="nazwisko" required>

        <label for="email">mail</label>
        <input type="email" id="email" name="email" required>

        <button id="dodaj" type="submit">dodaj uzytkownika</button>
    </form>

</body>
</html>
