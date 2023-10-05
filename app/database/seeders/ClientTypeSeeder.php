<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\ClientType::factory(3)->create();

         \App\Models\Client::factory()->create([
             'name' => 'Lead',
         ]);
         \App\Models\Client::factory()->create([
            'name' => 'New Customer',
        ]);
        \App\Models\Client::factory()->create([
            'name' => 'Regular Customer',
        ]);
    }
}
