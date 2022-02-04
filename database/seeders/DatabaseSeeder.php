<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// le classi seader servono per creare dati mock
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(20)->create();
    }
}
