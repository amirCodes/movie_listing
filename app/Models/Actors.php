<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Listing;

class Actors extends Model
{
    use HasFactory;
    protected $fillable = [
    	'name',
    	'sex',
    	'DOB',
    	'bio'
    ];

    public function listings (){
    	return $this->belongsToMany('App\Models\Listing', 'actor_listings');
    }
}
