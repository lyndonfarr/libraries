<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\View\View;
use App\Models\LibraryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryBookController extends Controller
{
    /**
     * Index LibraryBooks in the context of a Library.
     */
    public function library(Library $library): View
    {
        return view('library_book.library')->with(['library' => $library->load('libraryBooks.book.author')]);
    }

    /**
     * Return a LibraryBook to the Library.
     */
    public function return(LibraryBook $libraryBook): View
    {
        if (Auth::user()->cannot('return', $libraryBook)) {
            abort(403);
        }

        Auth::user()->returnLibraryBook($libraryBook);

        return view('library_book.view')->with(compact('libraryBook'));
    }

    /**
     * View a LibraryBook.
     */
    public function view(LibraryBook $libraryBook): View
    {
        return view('library_book.view')->with(compact('libraryBook'));
    }
}
