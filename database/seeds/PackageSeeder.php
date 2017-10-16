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
    }
}
