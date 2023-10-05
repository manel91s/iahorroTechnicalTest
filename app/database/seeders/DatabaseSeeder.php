<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ClientType::factory()->create([
            'name' => 'Lead',
        ]);
        \App\Models\ClientType::factory()->create([
           'name' => 'New Customer',
       ]);
       \App\Models\ClientType::factory()->create([
           'name' => 'Regular Customer',
       ]);
        
    }
}
