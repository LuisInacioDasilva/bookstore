<?php

use Illuminate\Support\Facades\Route;
use App\Models\Services\ConsultaLivrosService;


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

Route::get('/', function () {
    $consultaLivrosService = new ConsultaLivrosService();
    $consultaLivrosService->Processar();
    $dados = $consultaLivrosService->saida;

    return view('home', compact('dados'));
});


Route::get('/sobre-nos', function () {
    $consultaLivrosService = new ConsultaLivrosService();
    $consultaLivrosService->Processar();
    $dados = $consultaLivrosService->saida;

    return view('sobre-nos', compact('dados'));
});

