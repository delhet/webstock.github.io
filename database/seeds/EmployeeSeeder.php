<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee')->insert([
            [
                'full_name' => 'Budi Ajah',
                'birth_date' => '2000-01-20',
                'gender' => 'M',
                'address'        => 'Jl.Bekasi 1 No.30B, Bekasi, Jawa Barat',
                'phone'          => '08129029022',
                'email'         => 'budi@example.com',
                'password' => Hash::make('admin123'),
	        	'created_at' => date('Y-m-d'),
	        	'updated_at' => date('Y-m-d')
            ]
        ]);
    }
}
