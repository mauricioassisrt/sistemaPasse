<?php

use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//ROTA USUARIO
Route::resource('usuarios', 'UserController')->names('user')->parameters(['usuarios' => 'user']);
//ROTA ADMIN PASSE
Route::resource('admin', 'PasseController')->names('admin');

//ROTA ESTUDANTE
Route::resource('estudante', 'EstudanteController')->names('estudante')->parameters(['estudante' => 'estudante']);
Route::get('consultar', 'EstudanteController@consultarSituacao')->name('consultar.situacao');
Route::post('verificaCpf', 'EstudanteController@verificaCpf')->name('verifica.cpf');
Route::post('dadosResponsavel', 'EstudanteController@naoPossuiCpf')->name('nao.possui.cpf');
Route::post('dadosAluno', 'EstudanteController@possuiCpf')->name('possui.cpf');
Route::post('dadosDaSerie', 'EstudanteController@dadosAluno')->name('dados.serie');
Route::post('localizacao', 'EstudanteController@matricula')->name('ende');
Route::post('protocoloGerar', 'EstudanteController@finaliza')->name('finaliza');


/// MAIL
// Route::get('send-mail', function () {

//     $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => 'This is for testing email using smtp'
//     ];

//     \Mail::to('mauricioassisrt@gmail.com')->send(new \App\Mail\MyTestMail($details));

//     dd("Email is Sent.");
// });
