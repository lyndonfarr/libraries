<?php

namespace App\Models;

use App\Models\Member;
use App\Models\LibraryBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
    use HasFactory;

    /**
     * Get the Books the Library owns.
     */
    public function libraryBooks(): HasMany
    {
        return $this->hasMany(LibraryBook::class);
    }

    /**
     * Get the Members the Library owns.
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}
