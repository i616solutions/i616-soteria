<?php

use i616\Soteria\Http\Controllers\SecretController;
use i616\Soteria\Http\Controllers\TemplateController;
use i616\Soteria\Http\Controllers\TemplateFieldController;
use i616\Soteria\Http\Controllers\VaultController;
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
Route::middleware(['web'])->group(function () {
    // Vaults Routes
    Route::resource('vault', VaultController::class);
    //Additional Routes
    Route::get('/vault/dump', function () {
        return 'vault-dump';
    });
    //downloads database in encrypted zip format

    // Template Routes
    Route::resource('template', TemplateController::class);
    Route::get('/template/{template}/templateField/create', [TemplateFieldController::class, 'create'])->name('templateField.create');
    Route::post('/template/{template}/templateField', [TemplateFieldController::class, 'store'])->name('templateField.store');
    Route::get('/template/{template}/templateField/{templateField}', [TemplateFieldController::class, 'show'])->name('templateField.show');
    Route::get('/template/{template}/templateField/{templateField}/edit', [TemplateFieldController::class, 'edit'])->name('templateField.edit');
    Route::put('/template/{template}/templateField/{templateField}', [TemplateFieldController::class, 'update'])->name('templateField.update');
    Route::delete('/template/{template}/templateField/{templateField}', [TemplateFieldController::class, 'destroy'])->name('templateField.destroy');

    // Secrets Routes
    Route::resource('secret', SecretController::class);
    //deletes laravel and azure vault
    Route::get('/vault/{vault}/secret/create', [SecretController::class, 'create']);
    Route::post('/vault/{vault}/secret', [SecretController::class, 'store']);
    Route::get('/vault/{vault}/secret/{secret}', [SecretController::class, 'show']);
    Route::get('/vault/{vault}/secret/{secret}/edit', [SecretController::class, 'edit']);
    Route::put('/vault/{vault}/secret/{secret}', [SecretController::class, 'update']);
});
