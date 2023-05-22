<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Library;
use App\Models\LibraryBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'city',
        'library_id',
        'state',
        'user_id',
    ];

    /**
     * Get the Library that owns the Member.
     */
    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    /**
     * Get the User that owns the Member.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Find Members with a library_id.
     */
    public function scopeFindLibraryId(Builder $query, ?int $libraryId): Builder
    {
        return $query->when($libraryId, function (Builder $query) use ($libraryId) {
            return $query->where('library_id', $libraryId);
        });
    }

    /**
     * Find Members with a user_id.
     */
    public function scopeFindUserId(Builder $query, ?int $userId): Builder
    {
        return $query->when($userId, function (Builder $query) use ($userId) {
            return $query->where('user_id', $userId);
        });
    }

    /**
     * Rent a LibraryBook out.
     */
    public function rentLibraryBook(LibraryBook $libraryBook): bool
    {
        return $libraryBook->update([
            'borrowed_by_member_id' => $this->id,
            'borrowed_date' => Carbon::now(),
            'return_date' => Carbon::now()->addWeeks(2),
        ]);
    }

    /**
     * Return a LibraryBook.
     */
    public function returnLibraryBook(LibraryBook $libraryBook): bool
    {
        return $libraryBook->update([
            'borrowed_by_member_id' => null,
            'borrowed_date' => null,
            'return_date' => null,
        ]);
    }
}
