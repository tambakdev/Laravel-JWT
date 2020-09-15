<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class ProfileTransformer extends TransformerAbstract {
    
    public function transform(User $user){
        return [
            'name' => $user->name,
            'email' => $user->email,
            'last_login_at' => $user->last_login_at,
            'last_login_ip' => $user->last_login_ip,
            'created_at' => $user->created_at
        ];
    }
}