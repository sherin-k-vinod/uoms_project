<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           Client::create([
        	 'name' => 'client1',
        	 'username' => 'client@something.com',
        	 'password' => bcrypt('clientpass')
        ]);
    }
}
