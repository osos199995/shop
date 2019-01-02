<?php

use Illuminate\Database\Seeder;

class AdminCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\AdminCategories::create([
           'product_id'=> '1',
           'name'  => "bmw",
           'image'=>'osos.jbg'

        ]);
        \App\AdminCategories::create([
          'product_id'  => '2',
         'name'    => "fiat",
'image'=>'osos.jbg'
        ]);
        \App\AdminCategories::create([
         'product_id'   => '3',
          'name'   => "opel",
'image'=>'osos.jbg'
        ]);
    }
}
