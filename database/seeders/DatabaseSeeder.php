<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //First json
        $jsondata = file_get_contents(asset('/jsons/quotes1.json'));
        $data = json_decode($jsondata, true);
        foreach ($data as $row) {
            $quote = $row['quote'];
            $author = $row['author'];
            DB::insert('insert into quotes(quote, author) values(?,?)',[$quote, $author]);
        }

        // Second json
        $jsondata = file_get_contents(asset('/jsons/enterpreneur-quotes.json'));
        $data = json_decode($jsondata, true);
        foreach ($data as $row) {
            $quote = $row['text'];
            $author = $row['from'];
            DB::insert('insert into quotes(quote, author) values(?,?)',[$quote, $author]);
}
}
}