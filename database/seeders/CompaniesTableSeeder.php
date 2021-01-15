<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 10; $i++)
        {
            DB::table('companies')->insert([
                "Name"=>Str::random(10),
                "IndustryTitle"=>Str::random(15),
                "Address"=>Str::random(20),

            ]);
        }
    }
}
