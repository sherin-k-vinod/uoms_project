<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductVarientTableSeeder::class);
    }
}
