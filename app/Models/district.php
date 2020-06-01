<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    public function divition(){
    	return $this->belongsTo(divition::class, 'divition_id', 'id');
    }
}
