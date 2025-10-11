<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            $this->call([
                // Contact
                ContactSeeder::class,
                // Image home
                ImghomeSeeder::class,
                // Image shop
                ImgshopSeeder::class,
                // Liste email
                ListemailSeeder::class,
                // Menu
                MenuSeeder::class,
                // Slider
                SliderSeeder::class,
            ]);
        } catch (QueryException $e) {
            $this->command->info('Erreur d’insertion détectée. Processus de seed ignoré pour cet enregistrement.');
        }
    }
}
