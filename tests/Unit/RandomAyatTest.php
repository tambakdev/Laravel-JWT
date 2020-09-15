<?php

namespace Tests\Unit;

use App\RandomAyat;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RandomAyatTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRandomAyatPublic()
    {
        RandomAyat::truncate();
        RandomAyat::insert([
            [
                'arabic' => 'إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ، وَإِنَّمَا لِكُلِّ امْرِئٍ مَا نَوَى، فَمَنْ كَانَتْ هِجْرَتُهُ إِلَِى اللهِ وَرَسُوْلِهِ فَهِجْرَتُهُ إِلَى اللهِ وَرَسُوْلِهِ، وَمَنْ كَانَتْ هِجْرَتُهُ لِدُنْيَا يُصِيْبُهَا، أَوْ امْرَأَةٍ يَنْكِحُهَا، فَهِجْرَتُهُ إِلَى مَا هَاجَرَ إِلَيْهِ',
                'indonesia' => ' “Amalan-amalan itu hanyalah tergantung pada niatnya. Dan setiap orang itu hanyalah akan dibalas berdasarkan apa yang ia niatkan. Maka barang siapa yang hijrahnya kepada Allah dan Rasul-Nya, maka hijrahnya keapda Allah dan Rasul-Nya. Namun barang siapa yang hijrahnya untuk mendapatkan dunia atau seorang wanita yang ingin ia nikahi, maka hijrahnya kepada apa yang ia niatkan tersebut.” (HR. al Bukhari (1) dan Muslim (1907))'
            ],
            [
                'arabic' => 'أَفَمَن شَرَحَ اللَّهُ صَدْرَهُ لِلْإِسْلَامِ فَهُوَ عَلَىٰ نُورٍ مِّن رَّبِّهِ ۚ',
                'indonesia' => '“Apakah orang-orang yang dibukakan Allah hatinya untuk ( menerima) agama Islam lalu ia mendapat cahaya dari Rabbnya (sama dengan orang yang membatu hatinya)?” (az-Zumar: 22)'
            ]
        ]);

        $this->assertTrue(true);
        $this->get(route('modul.randomayat.quote'))
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testRandomAyatWithAuth(){
        // $this->loginAs();
        $this->get(route('modul.profile'))
        ->assertStatus(200);   
        
        $request = $this->getRandomAyat();
        $this->post(route('modul.randomayat.create'), $request)
            ->assertStatus(200);
    }

    private function getRandomAyat()
    {
        return [
            [
                'arabic' => 'ini arabicnya',
                'indonesia' => 'indonesianya'
            ]
        ];
    }
}
