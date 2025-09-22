<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Slider::firstOrCreate(
            ["filename" => 'slider-1.jpg'],
            ["libelle" => "Nous vous proposons<br><span>les meilleurs équipements</span><br>de protection individuelle"]
        );
        Slider::firstOrCreate(
            ["filename" => 'slider-2.jpg'],
            ["libelle" => "Nous vous proposons<br><span>les meilleurs équipements</span><br>de protection individuelle"]
        );
        Slider::firstOrCreate(
            ["filename" => 'slider-3.jpg'],
            ["libelle" => "Nous vous proposons<br><span>les meilleurs équipements</span><br>de protection individuelle"]
        );
    }
}
