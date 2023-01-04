<?php

namespace App\Traits;

use App\Models\Currency;
use App\Models\Option;
use App\Models\User;


trait Userid {

    public function Userid(){
        return User::get('id')->get();
    }

   
}
