  <html>
        <head>
            <link rel="stylesheet" href="/css/styleAdmin.css">
        </head>
        <body>
            <div class="panelCard">
                <h1>Panel Admina</h1>
                <p class="subtitle">Zarządzaj ofertami i użytkownikami w prosty sposób.</p>

                <div class="gridContainer">
                    <form method="GET" action="/oferta">
                        <button type="submit" class="gridButton">Dodanie oferty</button>
                    </form>
                    <form method="GET" action="/uzytkownicy">
                        <button type="submit" class="gridButton">Lista użytkowników</button>
                    </form>
                 
                     <form method="GET" action="/User">
                        <button type="submit" class="gridButton">Dodaj uzytkowanika</button>
                    </form>
                      <form method="GET" action="/logout">
                        <button type="submit" class="log">Wyloguj</button>
                    </form>
                </div>
            </div>
        </body>
    </html>