<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([[
            'first_name' => 'Jack',
            'last_name' => 'Jones',
        ], [
            'first_name' => 'Jim',
            'last_name' => 'Beam',
        ], [
            'first_name' => 'Bob',
            'last_name' => 'Dean',
        ], [
            'first_name' => 'Jack',
            'last_name' => 'Daniels',
        ], [
            'first_name' => 'Jonathon',
            'last_name' => 'Skywalker',
        ], [
            'first_name' => 'Danny',
            'last_name' => 'Miller',
        ]]);
    }
}
