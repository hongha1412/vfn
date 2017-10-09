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
            'fbname'      => 'Jake Braun',
            'userid'      => 1,
            'package'       => 1,
            'expiretime'      => 0,
            'likespeed'    => 100,
            'limitpost' => 0,
            'note'  => '',
        ]);
    }
}
