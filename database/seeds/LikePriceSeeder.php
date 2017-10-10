<?php

use Illuminate\Database\Seeder;
use App\Models\LikePrice;

class LikePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LikePrice::query()->truncate();

        LikePrice::create(['vnd' => 30000, 'likepackage' => 1, 'daypackage' => 1]);
        LikePrice::create(['vnd' => 50000, 'likepackage' => 2, 'daypackage' => 1]);
        LikePrice::create(['vnd' => 80000, 'likepackage' => 3, 'daypackage' => 1]);
        LikePrice::create(['vnd' => 120000, 'likepackage' => 4, 'daypackage' => 1]);
        LikePrice::create(['vnd' => 170000, 'likepackage' => 5, 'daypackage' => 1]);
        LikePrice::create(['vnd' => 250000, 'likepackage' => 6, 'daypackage' => 1]);
        LikePrice::create(['vnd' => 340000, 'likepackage' => 7, 'daypackage' => 1]);
        LikePrice::create(['vnd' => 60000, 'likepackage' => 1, 'daypackage' => 2]);
        LikePrice::create(['vnd' => 100000, 'likepackage' => 2, 'daypackage' => 2]);
        LikePrice::create(['vnd' => 160000, 'likepackage' => 3, 'daypackage' => 2]);
        LikePrice::create(['vnd' => 240000, 'likepackage' => 4, 'daypackage' => 2]);
        LikePrice::create(['vnd' => 340000, 'likepackage' => 5, 'daypackage' => 2]);
        LikePrice::create(['vnd' => 500000, 'likepackage' => 6, 'daypackage' => 2]);
        LikePrice::create(['vnd' => 640000, 'likepackage' => 7, 'daypackage' => 2]);
        LikePrice::create(['vnd' => 90000, 'likepackage' => 1, 'daypackage' => 3]);
        LikePrice::create(['vnd' => 150000, 'likepackage' => 2, 'daypackage' => 3]);
        LikePrice::create(['vnd' => 240000, 'likepackage' => 3, 'daypackage' => 3]);
        LikePrice::create(['vnd' => 360000, 'likepackage' => 4, 'daypackage' => 3]);
        LikePrice::create(['vnd' => 410000, 'likepackage' => 5, 'daypackage' => 3]);
        LikePrice::create(['vnd' => 750000, 'likepackage' => 6, 'daypackage' => 3]);
        LikePrice::create(['vnd' => 980000, 'likepackage' => 7, 'daypackage' => 3]);
        LikePrice::create(['vnd' => 120000, 'likepackage' => 1, 'daypackage' => 4]);
        LikePrice::create(['vnd' => 250000, 'likepackage' => 2, 'daypackage' => 4]);
        LikePrice::create(['vnd' => 320000, 'likepackage' => 3, 'daypackage' => 4]);
        LikePrice::create(['vnd' => 420000, 'likepackage' => 4, 'daypackage' => 4]);
        LikePrice::create(['vnd' => 580000, 'likepackage' => 5, 'daypackage' => 4]);
        LikePrice::create(['vnd' => 1000000, 'likepackage' => 6, 'daypackage' => 4]);
        LikePrice::create(['vnd' => 1320000, 'likepackage' => 7, 'daypackage' => 4]);
        LikePrice::create(['vnd' => 240000, 'likepackage' => 1, 'daypackage' => 5]);
        LikePrice::create(['vnd' => 300000, 'likepackage' => 2, 'daypackage' => 5]);
        LikePrice::create(['vnd' => 400000, 'likepackage' => 3, 'daypackage' => 5]);
        LikePrice::create(['vnd' => 540000, 'likepackage' => 4, 'daypackage' => 5]);
        LikePrice::create(['vnd' => 650000, 'likepackage' => 5, 'daypackage' => 5]);
        LikePrice::create(['vnd' => 1250000, 'likepackage' => 6, 'daypackage' => 5]);
        LikePrice::create(['vnd' => 1660000, 'likepackage' => 7, 'daypackage' => 5]);
    }
}
