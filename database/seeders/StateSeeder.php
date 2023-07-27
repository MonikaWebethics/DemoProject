<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = collect(
            [
                ['state' => 'Uttar Pradesh', 'country_id' => '1'], 
                ['state' => 'California', 'country_id' => '2'], 
                ['state' => 'London', 'country_id' => '3'], 
                ['state' => 'Ontario', 'country_id' => '4'], 
            
                ['state' => 'Maharashtra', 'country_id' => '1'], 
                ['state' => 'Texas', 'country_id' => '2'], 
                ['state' => 'Scotland', 'country_id' => '3'], 
                ['state' => 'Alberta', 'country_id' => '4'], 
            
                ['state' => 'Karnataka', 'country_id' => '1'],
                ['state' => 'New York', 'country_id' => '2'], 
                ['state' => 'Wales', 'country_id' => '3'], 
                ['state' => 'British Columbia', 'country_id' => '4'], 
            
                ['state' => 'Tamil Nadu', 'country_id' => '1'], 
                ['state' => 'Florida', 'country_id' => '2'], 
                ['state' => 'Northern Ireland', 'country_id' => '3'], 
                ['state' => 'Quebec', 'country_id' => '4'], 
            ]
        );

        $states->each(function($states){
            State::insert($states);
        });
    }
}
