<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 11; $i++)
        {
            for($j=1; $j< 21; $j++)
            {
                DB::table('employees')->insert([
                    "Name"=>Str::random(10),
                    "Designation"=>Str::random(15),
                    "Address"=>Str::random(20),
                    "company_id"=>$i,

                ]);

            }

        }
    }
}
