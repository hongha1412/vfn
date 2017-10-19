<?php

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::query()->truncate();

        Package::create(['type' => 0, 'total' => 150]);
        Package::create(['type' => 0, 'total' => 300]);
        Package::create(['type' => 0, 'total' => 500]);
        Package::create(['type' => 0, 'total' => 700]);
        Package::create(['type' => 0, 'total' => 1000]);
        Package::create(['type' => 0, 'total' => 1500]);
        Package::create(['type' => 0, 'total' => 2000]);

        Package::create(['type' => 1, 'total' => 15]);
        Package::create(['type' => 1, 'total' => 20]);
        Package::create(['type' => 1, 'total' => 25]);
        Package::create(['type' => 1, 'total' => 30]);
        Package::create(['type' => 1, 'total' => 35]);
        Package::create(['type' => 1, 'total' => 40]);
        Package::create(['type' => 1, 'total' => 45]);

        Package::create(['type' => 2, 'total' => 60]);
        Package::create(['type' => 2, 'total' => 100]);
        Package::create(['type' => 2, 'total' => 160]);
        Package::create(['type' => 2, 'total' => 260]);
        Package::create(['type' => 2, 'total' => 380]);
        Package::create(['type' => 2, 'total' => 560]);
        Package::create(['type' => 2, 'total' => 720]);

        Package::create(['type' => 3, 'total' => 60]);
        Package::create(['type' => 3, 'total' => 100]);
        Package::create(['type' => 3, 'total' => 160]);
        Package::create(['type' => 3, 'total' => 260]);
        Package::create(['type' => 3, 'total' => 380]);
        Package::create(['type' => 3, 'total' => 560]);
        Package::create(['type' => 3, 'total' => 720]);
    }
}
