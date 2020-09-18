<?php

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
            Unit::create([
        	 'name' => 'unit1',
        	 'username' => 'unit@something.com',
        	 'password' => bcrypt('unitpass')
        ]);
    }
}
