<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = collect(
            [
                [
                    'country' => 'India'
                ],
                [
                    'country' => 'United States'
                ],
                [
                    'country' => 'United Kingdom'
                ],
                [
                    'country' => 'Canada'
                ]
            ]
        );

        $countries->each(function($country){
            country::insert($country);
        });
        
    }
}
