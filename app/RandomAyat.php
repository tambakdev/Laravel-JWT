<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RandomAyat extends Model
{
    use SoftDeletes;

    protected $fillable = ['arabic', 'indonesia'];
}
