<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryBook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'borrowed_by_member_id',
        'borrowed_date',
        'return_date',
    ];

    /**
     * Get the Book that the LibraryBook refers to.
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the Library that the LibraryBook belongs to.
     */
    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    /**
     * Returns true if the LibraryBook is not currently rented out.
     */
    protected function isAvailable(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => is_null($attributes['borrowed_by_member_id']),
        );
    }
}
