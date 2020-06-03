<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class union extends Model
{
    public function divition(){
    	return $this->belongsTo(divition::class, 'divition_id', 'id');
    }
    public function district(){
    	return $this->belongsTo(district::class, 'district_id', 'id');
    }
    public function upazila(){
    	return $this->belongsTo(upazila::class, 'upazila_id', 'id');
    }
}
