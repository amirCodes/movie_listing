<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Listing;

class Producers extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name','sex','DOB','bio'
    ];

    public function listings(){
    	return $this->hasMany('App\Models\Listing');
    }
}
