<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibraryBookController;

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

Route::prefix('libraries')->group(function () {
    Route::get('/', [LibraryController::class, 'index'])->name('libraries.index');
    Route::get('/{library}', [LibraryController::class, 'view'])->name('libraries.view');    
});

Route::prefix('library-books')->group(function() {
    Route::get('/{libraryBook}', [LibraryBookController::class, 'view'])->name('library_books.view');
    Route::post('/{libraryBook}/return', [LibraryBookController::class, 'return'])->name('library_books.return');
    Route::get('/library/{library}', [LibraryBookController::class, 'library'])->name('library_books.library');
});

Route::prefix('members')->group(function () {
    Route::get('/create/{library}', [MemberController::class, 'create'])->name('members.create');
    Route::delete('/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    Route::post('/', [MemberController::class, 'store'])->name('members.store');
    Route::get('/user', [MemberController::class, 'user'])->name('members.user');
});

require __DIR__.'/auth.php';
