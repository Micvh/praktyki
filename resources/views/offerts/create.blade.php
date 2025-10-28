
<style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    background-color: #f0f2f5;
    padding-top: 50px;
}

#form1 {
    margin-top: 40px;
    background-color: #fff;
    padding: 30px 40px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 400px;
}

h1 {
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

input[type="text"],
input[type="password"],
input[type="number"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

textarea {
    height: 80px;
    resize: vertical;
}

#dodaj{
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

#dodaj:hover {
    background-color: #1dacff;
}

</style>
@section('content')
<div class="max-w-2xl mx-auto p-4 bg-white shadow-md rounded mt-6">
    <h2 class="text-2xl font-bold mb-4">Dodaj ofertę</h2>

    <form action="{{ route('offerts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block mb-2">Numer oferty:</label>
        <input type="text" name="OffertNumber" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Opis oferty:</label>
        <textarea name="OffertDescription" class="border p-2 w-full mb-4" required></textarea>

        <label class="block mb-2">Rozmiar mieszkania:</label>
        <input type="text" name="OffertSize" class="border p-2 w-full mb-4">

        <label class="block mb-2">Imię agenta:</label>
        <input type="text" name="AgentName" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Telefon agenta:</label>
        <input type="text" name="AgentPhone" class="border p-2 w-full mb-4">

        <label class="block mb-2">Typ oferty:</label>
        <div class="mb-4">
            <label><input type="checkbox" name="OffertType[]" value="Typ1"> Typ1</label>
            <label class="ml-4"><input type="checkbox" name="OffertType[]" value="Typ2"> Typ2</label>
        </div>

        <label class="block mb-2">Zdjęcia:</label>
        <input type="file" name="Photos[]" multiple class="border mb-4 w-full">

        <button type="submit" id="dodaj">Dodaj ofertę</button>
    </form>
</div>

