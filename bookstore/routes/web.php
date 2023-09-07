<?php

use Illuminate\Support\Facades\Route;
// use App\Models\Services\ConsultaLivrosService;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@ListaLivrosHome')->name('home');

Route::post('/consultar-cep', 'HomeController@ConsultaCep')->name('consultar-cep');

Route::get('/sobre-nos', function () { return view('sobre-nos');})->name('sobre-nos');



