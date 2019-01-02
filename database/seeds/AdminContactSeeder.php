<?php

use Illuminate\Database\Seeder;
use contact_us;

class AdminContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\contact_us::create(
            [
                "name"=>'title',
                "description"=>'des 1',
                "facebook"=>'facebook',
                "twitter"=>'twitter',
                "google"=>'google',
                "pihance"=>'pihance',
                "feature"=>"hi every one"
            ]
        );
    }
}
