<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //truncate all past data
        User::query()->truncate();
        Company::query()->truncate();
        Employee::query()->truncate();

        //insert admin data
        $admin = new User;
        $admin->name="Admin";
        $admin->email="admin@doorhub.io";
        $admin->password="Doorhub123456";
        $admin->is_admin=true;
        $admin->save();

        //insert company then its employees data
        for($i=0; $i<10; $i++)
        {
            $company = new Company;
            $company->Name= Str::random(10);
            $company->Address= Str::random(20);
            $company->IndustryTitle= Str::random(15);
            $company->save();
            $last_id = $company->id;

            for($j=0; $j<20; $j++)
            {
                $employee = new Employee;
                $employee->Name = Str::random(10);
                $employee->Address = Str::random(10);
                $employee->Designation = Str::random(10);
                $employee->company_id = $last_id;
                $employee->save();
            }

        }

    }
}
