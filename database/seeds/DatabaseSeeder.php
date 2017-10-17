<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RawTokenSeeder::class);
        $this->call(VipSeeder::class);
        $this->call(DayPackageSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(LikeSpeedSeeder::class);
        $this->call(AccountSeeder::class);
    }
}
