<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
            [
                'name' => 'Triyadi',
                'email' => 'triyaid@gmail.com',
                'password' => Hash::make('albani'),
                'created_at' => today()->subDays(5),
            ],
            [
                'name' => 'Khusnul Khotimah',
                'email' => 'nulnul@gmail.com',
                'password' => Hash::make('albani'),
                'created_at' => today()->subDays(3),
            ]
        ]);
    }
}
