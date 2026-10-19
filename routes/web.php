<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogController::class, 'index'])->middleware('throttle:30,1')->name('home');
Route::get('/busca-livro/{id_livro}', [CatalogController::class, 'show'])
    ->where('id_livro', 'OL[0-9]+W')
    ->middleware('throttle:30,1')
    ->name('busca-livro');
Route::get('/sobre-nos', [CatalogController::class, 'about'])->name('sobre-nos');
Route::redirect('/books', '/', 301)->name('books');
Route::get('/busca-categoria', [CatalogController::class, 'legacyCategory'])->name('busca-categoria');
