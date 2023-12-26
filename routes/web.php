<?php

use App\Http\Controllers\CredencialController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjetoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProjetoController::class, 'listar'])->name('principal');
Route::get('{slug}', [ProjetoController::class, 'mostrar'])->name('mostrar');

Route::prefix('credencial')->group(function() {
    Route::get('cadastro', [CredencialController::class, 'cadastrar'])->name('cadastrar-credencial');
    Route::post('', [CredencialController::class, 'inserir'])->name('inserir-credencial');
});

Route::prefix('login')->group(function() {
    Route::get('formulario', [LoginController::class, 'mostrarFormulario'])->name('formulario-de-login');
    Route::post('', [LoginController::class, 'logar'])->name('logar');
});

Route::prefix('{token}')->group(function() {
    Route::get('logout', [LoginController::class, 'deslogar'])->name('deslogar');
    Route::prefix('credencial')->group(function() {
        Route::get('edicao', [CredencialController::class, 'editar'])->name('editar-credencial');
        Route::put('', [CredencialController::class, 'atualizar'])->name('atualizar-credencial');
    });
    Route::prefix('projeto')->group(function() {
        Route::get('lista', [ProjetoController::class, 'listarAposLogado'])->name('lista-de-projetos');
        Route::get('cadastro', [ProjetoController::class, 'cadastrar'])->name('cadastrar-projeto');
        Route::get('edicao/{id}', [ProjetoController::class, 'editar'])->name('editar-projeto');
        Route::get('ameaca/{id}', [ProjetoController::class, 'ameacar'])->name('ameacar-projeto');
        Route::post('', [ProjetoController::class, 'inserir'])->name('inserir-projeto');
        Route::put('{id}', [ProjetoController::class, 'atualizar'])->name('atualizar-projeto');
        Route::delete('{id}', [ProjetoController::class, 'excluir'])->name("excluir-projeto");
    });
});
