<?php

use Illuminate\Database\Seeder;

class AdminProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

\App\Cars::create([
    'name'=>'x1',
    'model'=>'2015',
    'description'=>'good',
    'price'=>'500',
     'image'=>'ss.jpg'
]);
    }
}
