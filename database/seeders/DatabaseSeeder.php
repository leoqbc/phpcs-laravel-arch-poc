<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@app.local',
            'email_verified_at' => now(),
        ]);

        \App\Models\User::factory(5)->create();

        \App\Models\Owner::create([
            'first_name' => 'Ricardo',
            'last_name' => 'Lima'
        ]);

        \App\Models\Owner::create([
            'first_name' => 'Camila',
            'last_name' => 'Silva'
        ]);

        \App\Models\Motorcycle::create([
            'name'     => 'HD Iron azul 2005',
            'model'    => 'Iron 883',
            'brand'    => 'Harley Davidson',
            'price'    => 32_400.00,
            'owner_id' => 1,
        ]);

        \App\Models\Motorcycle::create([
            'name'     => 'HD Fatboy preta 2010',
            'model'    => 'Fatboy Special',
            'brand'    => 'Harley Davidson',
            'price'    => 42_900.00,
            'owner_id' => 1,
        ]);

        \App\Models\Motorcycle::create([
            'name'     => 'Yamaha Tenere',
            'model'    => 'XTZ 250 TÉNÉRÉ',
            'brand'    => 'Yamaha',
            'price'    => 20_300.00,
            'owner_id' => 2,
        ]);

        \App\Models\Motorcycle::create([
            'name'     => 'BMW S 1000 RR',
            'model'    => 'S 1000 RR',
            'brand'    => 'BMW',
            'price'    => 50_600.00,
            'owner_id' => 2,
        ]);
    }
}
