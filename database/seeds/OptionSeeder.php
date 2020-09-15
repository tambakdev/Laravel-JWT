<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::truncate();
        Option::insert([
            [
                'name' => 'tambakdev-name',
                'value' => 'CV. TambakDev'
            ],
            [
                'name' => 'tambakdev-slogan',
                'value' => 'Bersama membangun dengan teknologi'
            ],
            [
                'name' => 'tambakdev-address',
                'value' => 'Desa Kamulyan, Rt/Rw 09/03 no. 16 Kecamatan Tambak - Banyumas'
            ],
            [
                'name' => 'tambakdev-contact',
                'value' => '+6288802782089'
            ]
        ]);
    }
}
