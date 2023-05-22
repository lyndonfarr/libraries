<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Index all Libraries.
     */
    public function index(): View
    {
        $libraries = Library::all();

        return view('library.index')->with(compact('libraries'));
    }

    /**
     * View a Library.
     */
    public function view(Library $library): View
    {
        return view('library.view')->with(compact('library'));
    }
}
