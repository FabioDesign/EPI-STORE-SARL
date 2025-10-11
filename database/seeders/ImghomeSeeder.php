<?php

namespace Database\Seeders;

use App\Models\Imghome;
use Illuminate\Database\Seeder;

class ImghomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Imghome::firstOrCreate(
            ["filename" => '01.jpg'],
            ["libelle" => "Confection de tenue"]
        );
        Imghome::firstOrCreate(
            ["filename" => '02.jpg'],
            ["libelle" => "Vente d'EPI"]
        );
        Imghome::firstOrCreate(
            ["filename" => '03.jpg'],
            ["libelle" => "Pressing industriel"]
        );
        Imghome::firstOrCreate(
            ["filename" => '04.jpg'],
            ["libelle" => "Confection de tenue"]
        );
        Imghome::firstOrCreate(
            ["filename" => '05.jpg'],
            ["libelle" => "Vente d'EPI"]
        );
        Imghome::firstOrCreate(
            ["filename" => '06.jpg'],
            ["libelle" => "Pressing industriel"]
        );
    }
}
