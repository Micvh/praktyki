<?php

use Illuminate\Http\Request;
use App\Oferta;
// C:\xampp\php\php.exe -S localhost:8000 -t public  
$router->post('/login', function (Request $request) {
    $username = $request->input('username', '');
    $password = $request->input('password', '');
    $user = \App\Uzytkownik::where('username', $username)->first();
    if ($user && password_verify($password, $user->password)) {
        return redirect('/main');
    } else {
        return redirect('/loginZle');
    }
});
$router->post('/dodanie', 'OfertaController@dodaj');
$router->get('/logout', function () {
    return file_get_contents(__DIR__.'/../resources/views/login.php');
});
$router->get('/oferta', function () {
    return file_get_contents(__DIR__.'/../resources/views/dodanieoferty.php');
});

$router->get('/dodanie', function () {
    return file_get_contents(__DIR__.'/../resources/views/poDodaniu.php');
});

$router->get('/main', function () {
    return file_get_contents(__DIR__.'/../resources/views/panelGlowny.php');
});

$router->get('/loginZle', function () {
    return file_get_contents(__DIR__.'/../resources/views/loginZle.php');
});

$router->get('/', function () {
    return file_get_contents(__DIR__.'/../resources/views/login.php');
});
$router->get('/User', function () {
    return file_get_contents(__DIR__.'/../resources/views/addUser.php');
});
$router->get('/dodanieU', function () {
    return file_get_contents(__DIR__.'/../resources/views/poDodanieUser.php');
});
$router->get('/addUser', 'UserController@showAddForm'); 
$router->post('/users/add', 'UserController@addUser');  

