<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/add-student', [DashboardController::class, 'addStudent'])->name('add.student');
Route::get('/edit-student/{id}', [DashboardController::class, 'editStudent'])->name('edit.student');
Route::post('/update-student/{id}', [DashboardController::class, 'update'])->name('update.student');
Route::delete('/delete-student/{id}', [DashboardController::class, 'delete'])->name('delete.student');

require __DIR__.'/auth.php';
