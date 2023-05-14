<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ManhwaController;

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



Route::get('/', [HomeController::class, 'index']);
Route::get('/manga', [RouteController::class, 'loggedin'])->middleware('auth');
Route::get('/manga', [NotesController::class, 'index']);


//manga

Route::get('/manga', [MangaController::class, 'user'])->name('admin');
Route::get('/manga/{id}', [MangaController::class, 'show'])->name('show');
Route::get('/manga/datamanga/create', [MangaController::class, 'create'])->name('create');
Route::post('/manga', [MangaController::class, 'uploadmanga'])->name('upload');
Route::get('/manga/{id}/edit', [MangaController::class, 'editmanga'])->name('edit');
Route::patch('/manga/{id}', [MangaController::class, 'updatemanga'])->name('update');
Route::delete('/manga/{id}', [MangaController::class, 'deletemanga'])->name('delete');


//manhwa

Route::get('/manhwa', [ManhwaController::class, 'user']);
Route::get('/manhwa/{id}', [ManhwaController::class, 'show']);
Route::get('/manhwa/datamanga/create', [ManhwaController::class, 'create']);
Route::post('/manhwa', [ManhwaController::class, 'uploadmanhwa']);
Route::get('/manhwa/{id}/edit', [ManhwaController::class, 'editmanhwa']);
Route::patch('/manhwa/{id}', [ManhwaController::class, 'updatemanhwa']);
Route::delete('/manhwa/{id}', [ManhwaController::class, 'deletemanhwa']);







