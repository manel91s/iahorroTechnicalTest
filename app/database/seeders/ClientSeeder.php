<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Client::factory(3)->create();

         \App\Models\Client::factory()->create([
             'name' => Str::random(10),
             'email' => Str::random(10).'@gmail.com',
             'phone' => '1234567890',
             'type_id' => int::random(1, 3),
         ]);
    }
}
