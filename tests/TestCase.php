<?php

namespace Tests;

use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // public function loginAs($guard = 'api')
    // {
    //     if($guard === 'api'){
    //         $user = User::first();
    //     }
    //     return $this->actingAs($user, $guard);
    // }

}
