<?php

use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::query()->truncate();

        Price::create(['vnd' => 30000, 'type' => 0, 'package' => 1, 'daypackage' => 1]);
        Price::create(['vnd' => 50000, 'type' => 0, 'package' => 2, 'daypackage' => 1]);
        Price::create(['vnd' => 80000, 'type' => 0, 'package' => 3, 'daypackage' => 1]);
        Price::create(['vnd' => 120000, 'type' => 0, 'package' => 4, 'daypackage' => 1]);
        Price::create(['vnd' => 170000, 'type' => 0, 'package' => 5, 'daypackage' => 1]);
        Price::create(['vnd' => 250000, 'type' => 0, 'package' => 6, 'daypackage' => 1]);
        Price::create(['vnd' => 340000, 'type' => 0, 'package' => 7, 'daypackage' => 1]);
        Price::create(['vnd' => 60000, 'type' => 0, 'package' => 1, 'daypackage' => 2]);
        Price::create(['vnd' => 100000, 'type' => 0, 'package' => 2, 'daypackage' => 2]);
        Price::create(['vnd' => 160000, 'type' => 0, 'package' => 3, 'daypackage' => 2]);
        Price::create(['vnd' => 240000, 'type' => 0, 'package' => 4, 'daypackage' => 2]);
        Price::create(['vnd' => 340000, 'type' => 0, 'package' => 5, 'daypackage' => 2]);
        Price::create(['vnd' => 500000, 'type' => 0, 'package' => 6, 'daypackage' => 2]);
        Price::create(['vnd' => 640000, 'type' => 0, 'package' => 7, 'daypackage' => 2]);
        Price::create(['vnd' => 90000, 'type' => 0, 'package' => 1, 'daypackage' => 3]);
        Price::create(['vnd' => 150000, 'type' => 0, 'package' => 2, 'daypackage' => 3]);
        Price::create(['vnd' => 240000, 'type' => 0, 'package' => 3, 'daypackage' => 3]);
        Price::create(['vnd' => 360000, 'type' => 0, 'package' => 4, 'daypackage' => 3]);
        Price::create(['vnd' => 410000, 'type' => 0, 'package' => 5, 'daypackage' => 3]);
        Price::create(['vnd' => 750000, 'type' => 0, 'package' => 6, 'daypackage' => 3]);
        Price::create(['vnd' => 980000, 'type' => 0, 'package' => 7, 'daypackage' => 3]);
        Price::create(['vnd' => 120000, 'type' => 0, 'package' => 1, 'daypackage' => 4]);
        Price::create(['vnd' => 250000, 'type' => 0, 'package' => 2, 'daypackage' => 4]);
        Price::create(['vnd' => 320000, 'type' => 0, 'package' => 3, 'daypackage' => 4]);
        Price::create(['vnd' => 420000, 'type' => 0, 'package' => 4, 'daypackage' => 4]);
        Price::create(['vnd' => 580000, 'type' => 0, 'package' => 5, 'daypackage' => 4]);
        Price::create(['vnd' => 1000000, 'type' => 0, 'package' => 6, 'daypackage' => 4]);
        Price::create(['vnd' => 1320000, 'type' => 0, 'package' => 7, 'daypackage' => 4]);
        Price::create(['vnd' => 240000, 'type' => 0, 'package' => 1, 'daypackage' => 5]);
        Price::create(['vnd' => 300000, 'type' => 0, 'package' => 2, 'daypackage' => 5]);
        Price::create(['vnd' => 400000, 'type' => 0, 'package' => 3, 'daypackage' => 5]);
        Price::create(['vnd' => 540000, 'type' => 0, 'package' => 4, 'daypackage' => 5]);
        Price::create(['vnd' => 650000, 'type' => 0, 'package' => 5, 'daypackage' => 5]);
        Price::create(['vnd' => 1250000, 'type' => 0, 'package' => 6, 'daypackage' => 5]);
        Price::create(['vnd' => 1660000, 'type' => 0, 'package' => 7, 'daypackage' => 5]);
    }
}
