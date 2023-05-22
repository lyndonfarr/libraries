<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Member;
use App\Models\LibraryBook;
use Illuminate\Auth\Access\Response;

class LibraryBookPolicy
{
    /**
     * Check that the User can rent a LibraryBook.
     */
    public function rent(User $user, LibraryBook $libraryBook): bool
    {
        return $libraryBook->is_available && Member::findLibraryId($libraryBook->library_id)->findUserId($user->id)->exists();
    }

    /**
     * Check that the User can return a LibraryBook.
     */
    public function return(User $user, LibraryBook $libraryBook): bool
    {
        $member = Member::findLibraryId($libraryBook->library_id)->findUserId($user->id)->first();

        return $member && $libraryBook->borrowed_by_member_id === $member->id;
    }
}
