<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_firstname', 
        'visitor_lastname', 
        'visitor_email', 
        'visitor_mobile_no', 
        'visitor_gender', 
        'visitor_address', 
        'visitor_id', 
        'visitor_enter_by',
        'visit_time' 
];

}
