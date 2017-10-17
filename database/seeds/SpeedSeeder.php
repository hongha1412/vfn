<?php

use Illuminate\Database\Seeder;
use App\Models\Speed;

class SpeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speed::query()->truncate();

        Speed::create(['type' => 0, 'value' => 5]);
        Speed::create(['type' => 0, 'value' => 10]);
        Speed::create(['type' => 0, 'value' => 20]);
        Speed::create(['type' => 0, 'value' => 30]);
        Speed::create(['type' => 0, 'value' => 40]);
        Speed::create(['type' => 0, 'value' => 50]);
        Speed::create(['type' => 0, 'value' => 100]);

        Speed::create(['type' => 1, 'value' => 1]);
        Speed::create(['type' => 1, 'value' => 2]);
        Speed::create(['type' => 1, 'value' => 3]);
        Speed::create(['type' => 1, 'value' => 4]);
        Speed::create(['type' => 1, 'value' => 5]);
        Speed::create(['type' => 1, 'value' => 10]);
        Speed::create(['type' => 1, 'value' => 20]);
    }
}
