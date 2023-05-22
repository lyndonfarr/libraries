<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('libraries')->insert([[
            'created_at' => Carbon::createMidnightDate(2000, 1, 1),
            'name' => 'The Royal Library',
            'updated_at' => Carbon::createMidnightDate(2000, 1, 1),
        ], [
            'created_at' => Carbon::createMidnightDate(2010, 1, 1),
            'name' => 'The Unroyal library',
            'updated_at' => Carbon::createMidnightDate(2010, 1, 1),
        ]]);
    }
}
