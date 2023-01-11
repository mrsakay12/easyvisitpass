<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
                'visitor_code', 
                'visitor_firstname', 
                'visitor_lastname', 
                'visitor_email', 
                'visitor_mobile_no', 
                'visitor_gender', 
                'visitor_address', 
                'visitor_id', 
                'visitor_meet_person_name', 
                'visitor_purpose', 
                'visitor_reason_to_meet', 
                'visitor_enter_by',
                'visitor_status',
                'visit_time',
                
    ];

    public function userid(){
        return $this->belongsTo('App\Models\User','user_id')->withDefault();
    }
}
