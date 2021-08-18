<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group(function(){
    Route::get('/',[\App\Http\Controllers\ProdutoController::class,'index'])->name('produto.index');
    Route::get('/new', [\App\Http\Controllers\ProdutoController::class,'create'])->name('produto.create');
    Route::post('/store',[\App\Http\Controllers\ProdutoController::class,'store'])->name('produto.store');
    Route::get('/edit/{produto}', [\App\Http\Controllers\ProdutoController::class,'edit'])->name('produto.edit');
    Route::post('/update/{produto}', [\App\Http\Controllers\ProdutoController::class,'edit'])->name('produto.update');
    Route::get('/destroy/{produto}', [\App\Http\Controllers\ProdutoController::class,'destroy'])->name('produto.destroy');
});

Route::prefix('estruturas')->group(function(){
    Route::get('/', [\App\Http\Controllers\EstruturaController::class,'index'])->name('estrutura.index');
    Route::get('/new', [\App\Http\Controllers\EstruturaController::class,'create'])->name('estrutura.create');
    Route::post('/store',[\App\Http\Controllers\EstruturaController::class,'store'])->name('estrutura.store');
    Route::get('/edit/{estrutura}', [\App\Http\Controllers\EstruturaController::class,'edit'])->name('estrutura.edit');
    Route::post('/update/{estrutura}', [\App\Http\Controllers\EstruturaController::class,'update'])->name('estrutura.update');
    Route::get('/destroy/{estrutura}', [\App\Http\Controllers\EstruturaController::class,'destroy'])->name('estrutura.destroy');
});

