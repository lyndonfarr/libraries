<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Library;
use App\Models\LibraryBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * Get the Author that wrote the Book.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the Libraries that the Book can be found at.
     */
    public function libraryBooks(): HasMany
    {
        return $this->hasMany(LibraryBook::class);
    }
}
