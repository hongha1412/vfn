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

        Price::create(['vnd' => 30000, 'type' => 1, 'package' => 8, 'daypackage' => 1]);
        Price::create(['vnd' => 60000, 'type' => 1, 'package' => 9, 'daypackage' => 1]);
        Price::create(['vnd' => 100000, 'type' => 1, 'package' => 10, 'daypackage' => 1]);
        Price::create(['vnd' => 140000, 'type' => 1, 'package' => 11, 'daypackage' => 1]);
        Price::create(['vnd' => 170000, 'type' => 1, 'package' => 12, 'daypackage' => 1]);
        Price::create(['vnd' => 200000, 'type' => 1, 'package' => 13, 'daypackage' => 1]);
        Price::create(['vnd' => 250000, 'type' => 1, 'package' => 14, 'daypackage' => 1]);
        Price::create(['vnd' => 90000, 'type' => 1, 'package' => 8, 'daypackage' => 2]);
        Price::create(['vnd' => 120000, 'type' => 1, 'package' => 9, 'daypackage' => 2]);
        Price::create(['vnd' => 200000, 'type' => 1, 'package' => 10, 'daypackage' => 2]);
        Price::create(['vnd' => 240000, 'type' => 1, 'package' => 11, 'daypackage' => 2]);
        Price::create(['vnd' => 340000, 'type' => 1, 'package' => 12, 'daypackage' => 2]);
        Price::create(['vnd' => 400000, 'type' => 1, 'package' => 13, 'daypackage' => 2]);
        Price::create(['vnd' => 500000, 'type' => 1, 'package' => 14, 'daypackage' => 2]);
        Price::create(['vnd' => 180000, 'type' => 1, 'package' => 8, 'daypackage' => 3]);
        Price::create(['vnd' => 290000, 'type' => 1, 'package' => 9, 'daypackage' => 3]);
        Price::create(['vnd' => 400000, 'type' => 1, 'package' => 10, 'daypackage' => 3]);
        Price::create(['vnd' => 480000, 'type' => 1, 'package' => 11, 'daypackage' => 3]);
        Price::create(['vnd' => 510000, 'type' => 1, 'package' => 12, 'daypackage' => 3]);
        Price::create(['vnd' => 600000, 'type' => 1, 'package' => 13, 'daypackage' => 3]);
        Price::create(['vnd' => 750000, 'type' => 1, 'package' => 14, 'daypackage' => 3]);

        Price::create(['vnd' => 30000, 'type' => 2, 'package' => 15, 'daypackage' => 1]);
        Price::create(['vnd' => 50000, 'type' => 2, 'package' => 16, 'daypackage' => 1]);
        Price::create(['vnd' => 80000, 'type' => 2, 'package' => 17, 'daypackage' => 1]);
        Price::create(['vnd' => 120000, 'type' => 2, 'package' => 18, 'daypackage' => 1]);
        Price::create(['vnd' => 170000, 'type' => 2, 'package' => 19, 'daypackage' => 1]);
        Price::create(['vnd' => 250000, 'type' => 2, 'package' => 20, 'daypackage' => 1]);
        Price::create(['vnd' => 340000, 'type' => 2, 'package' => 21, 'daypackage' => 1]);
        Price::create(['vnd' => 60000, 'type' => 2, 'package' => 15, 'daypackage' => 2]);
        Price::create(['vnd' => 100000, 'type' => 2, 'package' => 16, 'daypackage' => 2]);
        Price::create(['vnd' => 160000, 'type' => 2, 'package' => 17, 'daypackage' => 2]);
        Price::create(['vnd' => 240000, 'type' => 2, 'package' => 18, 'daypackage' => 2]);
        Price::create(['vnd' => 340000, 'type' => 2, 'package' => 19, 'daypackage' => 2]);
        Price::create(['vnd' => 500000, 'type' => 2, 'package' => 20, 'daypackage' => 2]);
        Price::create(['vnd' => 640000, 'type' => 2, 'package' => 21, 'daypackage' => 2]);
        Price::create(['vnd' => 90000, 'type' => 2, 'package' => 15, 'daypackage' => 3]);
        Price::create(['vnd' => 150000, 'type' => 2, 'package' => 16, 'daypackage' => 3]);
        Price::create(['vnd' => 240000, 'type' => 2, 'package' => 17, 'daypackage' => 3]);
        Price::create(['vnd' => 360000, 'type' => 2, 'package' => 18, 'daypackage' => 3]);
        Price::create(['vnd' => 410000, 'type' => 2, 'package' => 19, 'daypackage' => 3]);
        Price::create(['vnd' => 750000, 'type' => 2, 'package' => 20, 'daypackage' => 3]);
        Price::create(['vnd' => 980000, 'type' => 2, 'package' => 21, 'daypackage' => 3]);
        Price::create(['vnd' => 120000, 'type' => 2, 'package' => 15, 'daypackage' => 4]);
        Price::create(['vnd' => 250000, 'type' => 2, 'package' => 16, 'daypackage' => 4]);
        Price::create(['vnd' => 320000, 'type' => 2, 'package' => 17, 'daypackage' => 4]);
        Price::create(['vnd' => 420000, 'type' => 2, 'package' => 18, 'daypackage' => 4]);
        Price::create(['vnd' => 580000, 'type' => 2, 'package' => 19, 'daypackage' => 4]);
        Price::create(['vnd' => 1000000, 'type' => 2, 'package' => 20, 'daypackage' => 4]);
        Price::create(['vnd' => 1320000, 'type' => 2, 'package' => 21, 'daypackage' => 4]);
        Price::create(['vnd' => 240000, 'type' => 2, 'package' => 15, 'daypackage' => 5]);
        Price::create(['vnd' => 300000, 'type' => 2, 'package' => 16, 'daypackage' => 5]);
        Price::create(['vnd' => 400000, 'type' => 2, 'package' => 17, 'daypackage' => 5]);
        Price::create(['vnd' => 540000, 'type' => 2, 'package' => 18, 'daypackage' => 5]);
        Price::create(['vnd' => 650000, 'type' => 2, 'package' => 19, 'daypackage' => 5]);
        Price::create(['vnd' => 1250000, 'type' => 2, 'package' => 20, 'daypackage' => 5]);
        Price::create(['vnd' => 1660000, 'type' => 2, 'package' => 21, 'daypackage' => 5]);

        Price::create(['vnd' => 30000, 'type' => 3, 'package' => 22, 'daypackage' => 1]);
        Price::create(['vnd' => 50000, 'type' => 3, 'package' => 23, 'daypackage' => 1]);
        Price::create(['vnd' => 80000, 'type' => 3, 'package' => 24, 'daypackage' => 1]);
        Price::create(['vnd' => 120000, 'type' => 3, 'package' => 25, 'daypackage' => 1]);
        Price::create(['vnd' => 170000, 'type' => 3, 'package' => 26, 'daypackage' => 1]);
        Price::create(['vnd' => 250000, 'type' => 3, 'package' => 27, 'daypackage' => 1]);
        Price::create(['vnd' => 340000, 'type' => 3, 'package' => 28, 'daypackage' => 1]);
        Price::create(['vnd' => 60000, 'type' => 3, 'package' => 22, 'daypackage' => 2]);
        Price::create(['vnd' => 100000, 'type' => 3, 'package' => 23, 'daypackage' => 2]);
        Price::create(['vnd' => 160000, 'type' => 3, 'package' => 24, 'daypackage' => 2]);
        Price::create(['vnd' => 240000, 'type' => 3, 'package' => 25, 'daypackage' => 2]);
        Price::create(['vnd' => 340000, 'type' => 3, 'package' => 26, 'daypackage' => 2]);
        Price::create(['vnd' => 500000, 'type' => 3, 'package' => 27, 'daypackage' => 2]);
        Price::create(['vnd' => 640000, 'type' => 3, 'package' => 28, 'daypackage' => 2]);
        Price::create(['vnd' => 90000, 'type' => 3, 'package' => 22, 'daypackage' => 3]);
        Price::create(['vnd' => 150000, 'type' => 3, 'package' => 3, 'daypackage' => 3]);
        Price::create(['vnd' => 240000, 'type' => 3, 'package' => 4, 'daypackage' => 3]);
        Price::create(['vnd' => 360000, 'type' => 3, 'package' => 5, 'daypackage' => 3]);
        Price::create(['vnd' => 410000, 'type' => 3, 'package' => 6, 'daypackage' => 3]);
        Price::create(['vnd' => 750000, 'type' => 3, 'package' => 27, 'daypackage' => 3]);
        Price::create(['vnd' => 980000, 'type' => 3, 'package' => 28, 'daypackage' => 3]);
        Price::create(['vnd' => 120000, 'type' => 3, 'package' => 22, 'daypackage' => 4]);
        Price::create(['vnd' => 250000, 'type' => 3, 'package' => 23, 'daypackage' => 4]);
        Price::create(['vnd' => 320000, 'type' => 3, 'package' => 24, 'daypackage' => 4]);
        Price::create(['vnd' => 420000, 'type' => 3, 'package' => 25, 'daypackage' => 4]);
        Price::create(['vnd' => 580000, 'type' => 3, 'package' => 26, 'daypackage' => 4]);
        Price::create(['vnd' => 1000000, 'type' => 3, 'package' => 27, 'daypackage' => 4]);
        Price::create(['vnd' => 1320000, 'type' => 3, 'package' => 28, 'daypackage' => 4]);
        Price::create(['vnd' => 240000, 'type' => 3, 'package' => 22, 'daypackage' => 5]);
        Price::create(['vnd' => 300000, 'type' => 3, 'package' => 23,'daypackage' => 5]);
        Price::create(['vnd' => 400000, 'type' => 3, 'package' => 24,'daypackage' => 5]);
        Price::create(['vnd' => 540000, 'type' => 3, 'package' => 25,'daypackage' => 5]);
        Price::create(['vnd' => 650000, 'type' => 3, 'package' => 26,'daypackage' => 5]);
        Price::create(['vnd' => 1250000, 'type' => 3, 'package' => 27, 'daypackage' => 5]);
        Price::create(['vnd' => 1660000, 'type' => 3, 'package' => 28, 'daypackage' => 5]);
    }}