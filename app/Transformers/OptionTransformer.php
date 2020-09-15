<?php

namespace App\Transformers;

use App\Option;
use League\Fractal\TransformerAbstract;

class OptionTransformer extends TransformerAbstract {
    
    public function transform(Option $option){
        return [
            'name' => $option->name,
            'value' => $option->value
        ];
    }
}