<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_firstname', 
        'register_lastname', 
        'register_email', 
        'register_mobile_no', 
        'register_gender', 
        'register_address', 
        'register_meet_person_name', 
        'register_enter_by', 
        'register_visitdate'
    
];

public function regperson(){
    return $this->belongsTo('App\Models\User','register_meet_person_name')->withDefault();
}


}
