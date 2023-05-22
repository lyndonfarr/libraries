<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookLibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('library_books')->insert([[
            'book_id' => 1,
            'library_id' => 1,
        ], [
            'book_id' => 2,
            'library_id' => 1,
        ], [
            'book_id' => 3,
            'library_id' => 1,
        ], [
            'book_id' => 4,
            'library_id' => 1,
        ], [
            'book_id' => 5,
            'library_id' => 1,
        ], [
            'book_id' => 6,
            'library_id' => 2,
        ], [
            'book_id' => 7,
            'library_id' => 2,
        ], [
            'book_id' => 8,
            'library_id' => 2,
        ], [
            'book_id' => 9,
            'library_id' => 2,
        ], [
            'book_id' => 10,
            'library_id' => 2,
        ], [
            'book_id' => 1,
            'library_id' => 2,
        ], [
            'book_id' => 2,
            'library_id' => 2,
        ]]);
    }
}
