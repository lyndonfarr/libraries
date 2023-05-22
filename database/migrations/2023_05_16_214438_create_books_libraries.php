<?php

use App\Models\Book;
use App\Models\Library;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('library_books', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class)->references('id')->on('books');
            $table->foreignIdFor(Library::class)->references('id')->on('libraries');
            $table->foreignId('borrowed_by_member_id')->nullable()->references('id')->on('members');
            $table->dateTime('borrowed_date')->nullable();
            $table->dateTime('return_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_books');
    }
};
