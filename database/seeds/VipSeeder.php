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
            'idfb'      => '100000137471731',
            'name'      => 'V\u0169 H\u1ed3ng H\u00e0',
            'user'      => 1,
            'goi'       => 1,
            'time'      => 0,
            'solike'    => 100,
            'limitpost' => 0,
            'chuthich'  => '',
        ]);
    }
}
