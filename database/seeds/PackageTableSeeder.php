<?php

use Illuminate\Database\Seeder;
use \App\Package;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(app()->environment('local')) {
            factory(Package::class, 20)->create();
        }
    }
}
