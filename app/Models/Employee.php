<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at','deleted_at','inv_date'];

    public function userid(){
        return $this->belongsTo('App\Models\User','user_id')->withDefault();
    }

    protected $fillable = [
        'first_name', 
        'last_name', 
        'phone', 
        'nickname', 
        'gender', 
        'department_id', 
        'designation_id', 
        'about', 
        'user_id', 
        'created_by', 
        'address',
        
        
];
}
