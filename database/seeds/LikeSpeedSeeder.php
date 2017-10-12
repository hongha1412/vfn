<?php

use Illuminate\Database\Seeder;
use App\Models\LikeSpeed;

class LikeSpeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LikeSpeed::query()->truncate();

        LikeSpeed::create(['value' => 5]);
        LikeSpeed::create(['value' => 10]);
        LikeSpeed::create(['value' => 20]);
        LikeSpeed::create(['value' => 30]);
        LikeSpeed::create(['value' => 40]);
        LikeSpeed::create(['value' => 50]);
        LikeSpeed::create(['value' => 100]);
    }
}
