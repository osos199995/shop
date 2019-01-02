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
        // $this->call(UsersTableSeeder::class);

        $this->call(AdminCategories::class);
        $this->call(AdminProductsSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(AdminContactSeeder::class);
    }
}
