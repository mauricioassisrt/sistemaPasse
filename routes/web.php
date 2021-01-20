<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('index');
});
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//ROTA USUARIO
Route::resource('usuarios', 'UserController')->names('user')->parameters(['usuarios' => 'user']);
//ROTA ESTUDANTE

Route::get('estudante', 'EstudanteController@index')->name('estudante.index');
Route::post('estudante/store', 'EstudanteController@store')->name('estudante.store');
Route::post('verificaCpf', 'EstudanteController@verificaCpf')->name('verifica.cpf');
Route::post('dadosResponsavel', 'EstudanteController@naoPossuiCpf')->name('nao.possui.cpf');
Route::post('dadosAluno', 'EstudanteController@possuiCpf')->name('possui.cpf');
Route::post('dadosDaSerie', 'EstudanteController@dadosAluno')->name('dados.serie');
Route::post('localizacao', 'EstudanteController@matricula')->name('ende');
Route::post('protocoloGerar', 'EstudanteController@finaliza')->name('finaliza');

//Status
Route::get('status', 'StatusController@index')->name('status');
Route::get('status/novo', 'StatusController@create')->name('status.create');
Route::post('status/store', 'StatusController@store')->name('status.store');
Route::get('status/edit/{status}', 'StatusController@edit')->name('status.edit');
Route::patch('status/update/{status}', 'StatusController@update')->name('status.update');
Route::get('status/deletar/{status}', 'StatusController@destroy')->name('status.delete');
Route::get('status/pesquisar', 'StatusController@search')->name('status.pesquisar');

//ANDAMENTO
Route::get('andamentos', 'AndamentoController@index')->name('andamentos');
Route::get('andamentos/iniciar/{objetoEstudante}', 'AndamentoController@realizar_andamento')->name('andamento.iniciar');
Route::post('andamentos/iniciar/efetuar', 'AndamentoController@novo_andamento')->name('andamento.novo');
Route::post('andamentos/finalizar', 'AndamentoController@finalizar')->name('andamento.finalizar');
Route::get('andamentos/pesquisar', 'AndamentoController@search')->name('andamentos.pesquisar');
Route::get('andamentos/consulta', 'AndamentoController@consulta_situacao')->name('andamentos.consulta');
Route::post('cpf/protocolo', 'AndamentoController@consultarSituacaoParametros')->name('cpf.protocolo');
//CONSULTAR PROTOCOLO DE
Route::get('consultar', 'AndamentoController@consultarSituacao')->name('consultar.situacao');
