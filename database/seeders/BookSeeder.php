<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([[
            'author_id' => 1,
            'isbn' => 12345678910,
            'title' => 'Title 1',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 2,
            'isbn' => 10123456789,
            'title' => 'Title 2',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 3,
            'isbn' => 91012345678,
            'title' => 'Title 3',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 4,
            'isbn' => 810123456789,
            'title' => 'Title 4',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 5,
            'isbn' => 710123456789,
            'title' => 'Title 5',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 6,
            'isbn' => 610123456789,
            'title' => 'Title 6',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 1,
            'isbn' => 510123456789,
            'title' => 'Title 7',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 1,
            'isbn' => 410123456789,
            'title' => 'Title 8',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 2,
            'isbn' => 310123456789,
            'title' => 'Title 9',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ], [
            'author_id' => 1,
            'isbn' => 210123456789,
            'title' => 'Title 10',
            'blurb' => 'rapldfgklsdfl slkdjflskj faskdfhlajkdshf jkhsadlfkh asjkdhfaskljdf',
        ]]);
    }
}
