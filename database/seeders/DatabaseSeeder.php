<?php

namespace Database\Seeders;

use App\Models\Actors;
use App\Models\Listing;
use App\Models\Producers;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(4)->create();

        Listing::create([
            // 'actor_id' =>'',
            // 'producer_id' => '',
            'name' => 'Titanic',
            'YOR' => '2001',
            'plot' => 'abc',
            'poster' =>'image.png'
        ]);
        
        Listing::create([
            // 'actor_id' =>'',
            // 'producer_id' => '',
            'name' => 'Iron Man 3',
            'YOR' => '2018',
            'plot' => 'xyz',
            'poster' =>'image.png'
        ]);

        Actors::create([
            'name' => 'Johnny Depp',
            'sex' => 'Male',
            'DOB' => '1963',
            'bio' => 'John Christopher Depp II is an American actor, producer and musician. He is the recipient of multiple accolades, including a Golden Globe Award and a Screen Actors Guild Award, in addition to nominations for three Academy Awards and two BAFTAs.'
        ]);
        
        Actors::create([
            'name' => 'Steven ',
            'sex' => 'Male',
            'DOB' => '1990',
            'bio' => 'This is just basic info for steven tesinting to work with seeds'
        ]);

        Producers::create([
            'name' => 'Kathleen Kennedy ',
            'sex' => 'Female',
            'DOB' => '1953',
            'bio' => 'Kathleen Kennedy is an American film producer and current president of Lucasfilm. In 1981, she co-founded the production company Amblin Entertainment with Steven Spielberg and her husband Frank Marshall.'
        ]);
        
        Producers::create([
            'name' => 'Steven Spielberg ',
            'sex' => 'Male',
            'DOB' => '1946',
            'bio' => 'Steven Allan Spielberg is an American film director, producer, and screenwriter. A notable figure of the New Hollywood era, he is the most commercially successful director of all time'
        ]);
    }
}
