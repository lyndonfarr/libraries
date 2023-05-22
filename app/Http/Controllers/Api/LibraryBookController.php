<?php

namespace App\Http\Controllers\Api;

use App\Models\Member;
use App\Models\LibraryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryBook\RentToMember;

class LibraryBookController extends Controller
{
    /**
     * Rent a book out to a member.
     */
    public function rent(LibraryBook $libraryBook): array
    {
        Auth::user()->rentLibraryBook($libraryBook);

        return ['library_book' => $libraryBook];
    }
}
