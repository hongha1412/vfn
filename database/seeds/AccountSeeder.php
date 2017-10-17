<?php

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::query()->truncate();

        $hasher = new \App\Http\Controllers\Common\PasswordHasher();
        Account::create([
            'username' => 'Sabrac',
            'password' => \Illuminate\Support\Facades\Hash::make($hasher->encrypt('zdshzdr1')),
            'fullname' => 'Sabrac',
            'mail'     => 'admin@localhost.com',
        ]);
    }
}
