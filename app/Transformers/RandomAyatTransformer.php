<?php

namespace App\Transformers;

use App\RandomAyat;
use League\Fractal\TransformerAbstract;

class RandomAyatTransformer extends TransformerAbstract
{

    public function transform(RandomAyat $randomayat)
    {
        return [
            'arabic' => $randomayat->arabic,
            'indonesia' => $randomayat->indonesia
        ];
    }
}