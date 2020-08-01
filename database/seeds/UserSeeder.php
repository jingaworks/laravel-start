<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@mail.com',
                'phone'              => '0735059617',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-07-30 16:17:11',
                'verification_token' => '',
            ],
            [
                'id'                 => 2,
                'name'               => 'Seller Name',
                'email'              => 'seller@mail.com',
                'phone'              => '0735000000',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-07-30 16:17:11',
                'verification_token' => '',
            ],
            [
                'id'                 => 3,
                'name'               => 'Buyer Name',
                'email'              => 'buyer@mail.com',
                'phone'              => '0735000001',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-07-30 16:17:11',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}