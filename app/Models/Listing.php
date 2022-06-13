<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actors;
use App\Models\Producers;


class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
    	'YOR',
    	'plot',
    	'poster'
    ];

    public function actors (){
    	return $this->belongsToMany('App\Models\Actors', 'actor_listings');
    }

    public function producer(){
        return $this->belongsTo('App\Models\Producers');
    }

}
