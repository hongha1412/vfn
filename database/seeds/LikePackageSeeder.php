<?php

use Illuminate\Database\Seeder;
use App\Models\LikePackage;

class LikePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LikePackage::query()->truncate();

        LikePackage::create(['liketotal' => 150]);
        LikePackage::create(['liketotal' => 300]);
        LikePackage::create(['liketotal' => 500]);
        LikePackage::create(['liketotal' => 700]);
        LikePackage::create(['liketotal' => 1000]);
        LikePackage::create(['liketotal' => 1500]);
        LikePackage::create(['liketotal' => 2000]);
    }
}
