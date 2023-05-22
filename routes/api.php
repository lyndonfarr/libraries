<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\BookCollection;
use App\Http\Controllers\Api\LibraryBookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', function () {
    return new BookCollection(Book::all());
});

Route::post('/library-books/{libraryBook}/rent', [LibraryBookController::class, 'rent'])
    ->name('library_books.rent')
    ->middleware(['auth:sanctum', 'ability:rent']);