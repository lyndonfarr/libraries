<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Member;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the Members that the User owns.
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Check if the User is a Member of a Library.
     */
    public function isMemberOfLibrary(Library $library): bool
    {
        return $this->members->pluck('library_id')->contains($library->id);
    }

    /**
     * Rent a LibraryBook out.
     */
    public function rentLibraryBook(LibraryBook $libraryBook)
    {
        $member = Member::findLibraryId($libraryBook->library_id)->findUserId($this->id)->first();

        return $member->rentLibraryBook($libraryBook);
    }

    /**
     * Return a LibraryBook to the Library.
     */
    public function returnLibraryBook(LibraryBook $libraryBook)
    {
        $member = Member::findLibraryId($libraryBook->library_id)->findUserId($this->id)->first();

        return $member->returnLibraryBook($libraryBook);
    }
}
