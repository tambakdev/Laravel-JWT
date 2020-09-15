<?php 

namespace App\Helpers;

use App\Option;
use App\Transformers\OptionTransformer;

class getOption {
    public static function get_option($name){
        $getOption = Option::whereName($name)
            ->first();
            
        $response = fractal()
            ->item($getOption)
            ->transformWith(new OptionTransformer)
            ->toArray();
        return response()->json($response, 200);
    }
}