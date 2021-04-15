<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mproduct extends Model
{
       public $timestamps=false;

    protected $fillable = 
    [
        'name', 'price', 'quantity'
    ];
}
