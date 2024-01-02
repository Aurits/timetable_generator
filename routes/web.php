<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Generate;

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