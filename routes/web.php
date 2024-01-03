<?php

use App\Livewire\Archived;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Generate;
use App\Livewire\Records;

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


Route::get('/', Home::class);
Route::get('/generate', Generate::class);
Route::get('/records', Records::class);
Route::get('/archived', Archived::class);
Route::get('/archived/{classId}', [Archived::class, 'show'])->name('archived.show');
Route::get('/search', [Records::class, 'search'])->name('search');
