<?php

use Illuminate\Database\Seeder;
use App\Models\DayPackage;

class DayPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DayPackage::query()->truncate();

        DayPackage::create(['daytotal' => 30]);
        DayPackage::create(['daytotal' => 60]);
        DayPackage::create(['daytotal' => 90]);
        DayPackage::create(['daytotal' => 120]);
        DayPackage::create(['daytotal' => 150]);
    }
}
