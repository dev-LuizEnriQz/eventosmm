<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Crea un usuario predeterminado para el Seeder Faker
        User::factory()->create([
            'id'=>1,
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('Negro121'),
        ]);
        $this->call([

            ClientSeeder::class,
        ]);
    }
}
