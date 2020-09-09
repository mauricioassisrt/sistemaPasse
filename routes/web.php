<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Auth::routes();



// +--------+-----------+----------------------------+-------------------+--------------------------------------------------+------------+
// | Domain | Method    | URI                        | Name              | Action                                           | Middleware |
// +--------+-----------+----------------------------+-------------------+--------------------------------------------------+------------+
// |        | GET|HEAD  | /                          |                   | Closure                                          | web        |
// |        | GET|HEAD  | api/user                   |                   | Closure                                          | api        |
// |        |           |                            |                   |                                                  | auth:api   |
// |        | POST      | estudante                  | estudante.store   | App\Http\Controllers\EstudanteController@store   | web        |
// |        | GET|HEAD  | estudante                  | estudante.index   | App\Http\Controllers\EstudanteController@index   | web        |
// |        | GET|HEAD  | estudante/create           | estudante.create  | App\Http\Controllers\EstudanteController@create  | web        |
// |        | PUT|PATCH | estudante/{estudante}      | estudante.update  | App\Http\Controllers\EstudanteController@update  | web        |
// |        | GET|HEAD  | estudante/{estudante}      | estudante.show    | App\Http\Controllers\EstudanteController@show    | web        |
// |        | DELETE    | estudante/{estudante}      | estudante.destroy | App\Http\Controllers\EstudanteController@destroy | web        |
// |        | GET|HEAD  | estudante/{estudante}/edit | estudante.edit    | App\Http\Controllers\EstudanteController@edit    | web        |
// |        | GET|HEAD  | test                       |                   | App\Http\Controllers\FirebaseController@index    | web        |
// |        | POST      | usuarios                   | user.store        | App\Http\Controllers\UserController@store        | web        |
// |        | GET|HEAD  | usuarios                   | user.index        | App\Http\Controllers\UserController@index        | web        |
// |        | GET|HEAD  | usuarios/create            | user.create       | App\Http\Controllers\UserController@create       | web        |
// |        | DELETE    | usuarios/{user}            | user.destroy      | App\Http\Controllers\UserController@destroy      | web        |
// |        | GET|HEAD  | usuarios/{user}            | user.show         | App\Http\Controllers\UserController@show         | web        |
// |        | PUT|PATCH | usuarios/{user}            | user.update       | App\Http\Controllers\UserController@update       | web        |
// |        | GET|HEAD  | usuarios/{user}/edit       | user.edit         | App\Http\Controllers\UserController@edit         | web        |
// +--------+-----------+----------------------------+-------------------+--------------------------------------------------+------------+
//ROTA USUARIO
Route::resource('usuarios', 'UserController')->names('user')->parameters(['usuarios' => 'user']);
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
