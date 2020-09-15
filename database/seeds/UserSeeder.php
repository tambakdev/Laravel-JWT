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
                'name' => 'Wong Tambak',
                'email' => 'tambak@gmail.com',
                'password' => Hash::make('tambak'),
                'created_at' => today()->subDays(5),
            ]
        ]);
    }
}
