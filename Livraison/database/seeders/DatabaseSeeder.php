<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\Supermarche;
use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        $admin =  Role::create([
          'name'=>'admin'
          ]);
         $client =  Role::create([
           'name'=>'client'
           ]);
         $livreur =  Role::create([
               'name'=>'livreur'
               ]);
         $supermarche =  Role::create([
               'name'=>'supermarche'
         ]);

         $azima = Supermarche::create([
            'nom_sup'=>'Azima Store',
            'email_sup'=>'azimastore@gmail.com',
            'adresse_sup'=>'Bidossessi',
            'image_sup'=>'azima.jpg'
        ]);
    }
}
