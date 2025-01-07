<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-home',[UserController::class,'index'])->name('user_home');
Route::get('/editor',[EditorController::class,'index'])->name('editor.index');

Route::get('/create',[EditorController::class,'create'])->name('editor.create');
Route::get('/edit/{id}',[EditorController::class,'edit'])->name('editor.edit');
Route::post('/store',[EditorController::class,'store'])->name('editor.store');
Route::get('/list',[EditorController::class,'list'])->name('editor.list');
Route::put('/update/{id}',[EditorController::class,'update'])->name('editor.update');
Route::get('/preview',[EditorController::class,'preview'])->name('editor.preview');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
