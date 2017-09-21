<?php

use Illuminate\Database\Seeder;
use App\Models\Vip;

class VipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vip::query()->truncate();

        Vip::create([
            'idfb'      => '100003626686858',
            'name'      => 'Jake Braun',
            'user'      => 1,
            'goi'       => 1,
            'time'      => 0,
            'solike'    => 100,
            'limitpost' => 0,
            'chuthich'  => '',
        ]);
    }
}
