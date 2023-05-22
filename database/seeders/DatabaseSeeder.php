<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\LibrarySeeder;
use Database\Seeders\BookLibrarySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LibrarySeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            BookLibrarySeeder::class,
        ]);
    }
}
