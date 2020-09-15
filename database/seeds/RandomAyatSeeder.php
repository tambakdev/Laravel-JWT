<?php

use App\RandomAyat;
use Illuminate\Database\Seeder;

class RandomAyatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
            ],
            [
                'arabic' => 'فَمَن يُرِدِ اللَّهُ أَن يَهْدِيَهُ يَشْرَحْ صَدْرَهُ لِلْإِسْلَامِ ۖ وَمَن يُرِدْ أَن يُضِلَّهُ يَجْعَلْ صَدْرَهُ ضَيِّقًا حَرَجًا كَأَنَّمَا يَصَّعَّدُ فِي السَّمَاءِ',
                'indonesia' => ' “Barang siapa yang Allah kehendaki akan memberikan kepadanya petunjuk, niscaya Dia melapangkan dadanya untuk (memeluk agama) Islam. Dan barang siapa yang dikehendaki Allah Subhanahu wa ta’ala kesesatannya, niscaya Allah menjadikan dadanya sesak lagi sempit, seolah-olah ia sedang mendaki langit.” (al-An’am 125)'
            ],
            [
                'arabic' => 'إِنَّ الَّذِينَ آمَنُوا وَالَّذِينَ هَاجَرُوا وَجَاهَدُوا فِي سَبِيلِ اللَّهِ أُولَٰئِكَ يَرْجُونَ رَحْمَتَ اللَّهِ ۚ وَاللَّهُ غَفُورٌ رَّحِيمٌ',
                'indonesia' => ' “Sesungguhnya orang-orang yang beriman, orang-orang yang berhijrah dan berjihad di jalan Allah, mereka itu mengharapkan rahmat Allah, dan Allah Maha Pengampun lagi Maha Penyayang.” (al-Baqarah: 218)'
            ],
            [
                'arabic' => 'إِنَّ أَكْرَمَكُمْ عِندَ اللَّهِ أَتْقَاكُمْ',
                'indonesia' => '“Sesungguhnya orang yang paling mulia diantara kalian disisi Allah ialah orang yang paling takwa diantara kalian.” (al-Hujurat: 13)'
            ],
            [
                'arabic' => 'أَفَأَمِنُوا مَكْرَ اللَّهِ ۚ فَلَا يَأْمَنُ مَكْرَ اللَّهِ إِلَّا الْقَوْمُ الْخَاسِرُونَ',
                'indonesia' => ' “Apakah mereka merasa aman dari azab Allah (yang tidak terduga-duga)? Tiada yang merasa aman dari azab Allah kecuali orang-orang yang merugi.” (al- A’raf: 99)'
            ],
            [
                'arabic' => 'يَا عِبَادِي، إِنَّكُمْ لَنْ تَبْلُغُوا ضُرِّي فَتَضُرُّونِي',
                'indonesia' => '“Hai para hamba-Ku, sesungguhnya kalian tidak mampu berbuat mudarat terhadap-Ku hingga mencelakai- Ku. Kalian juga tidak dapat berbuat kemanfaatan bagi-Ku hingga memberiku manfaat.” Rasulullah shallallahu ‘alaihi wa sallam menyebutkannya setelahnya,'
            ]
        ]);
    }
}
