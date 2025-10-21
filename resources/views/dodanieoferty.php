 <html>
        <head>
            <link rel="stylesheet" href="/css/styleDodanie.css">
        </head>
        <body>
            <nav>
                <form method="GET" action="/logout">
                    <button type="submit">Wyloguj</button>
                </form>
                <form method="GET" action="/main">
                    <button type="submit">Panel główny</button>
                </form>
            </nav>

            <form id="form1" method="POST" action="/dodanie" enctype="multipart/form-data">
                <label>Numer</label>
                <input type="text" name="numer" required>

                <label>Tytul</label>
                <input type="text" name="tytul" required>

                <label>Opis</label>
                <textarea name="opis" required></textarea>

                <label>Adres</label>
                <input type="text" name="lokalizacja" required>

                <label>Cena</label>
                <input type="number" name="cena" required>

                <label>Powierzchnia</label>
                <input type="number" name="metraz" required>

                <label>zdjecia</label>
                <input type="file" name="zdjecia[]" multiple>

                <label>telefon</label>
                <input type="text" name="telefon" required>

                <label>dane agenta</label>
                <input type="text" name="agent" required>

                <button type="submit" class="navButton" id="dodaj">Dodaj ofertę</button>
            </form>
        </body>
    </html>