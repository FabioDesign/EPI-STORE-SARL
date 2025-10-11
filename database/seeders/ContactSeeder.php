<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Contact::firstOrCreate(
            ["email" => 'info@epistores.com'],
            [
                "opening" => "Lun - Vend (08h - 18h)",
                "phone" => "+225 07 08 17 11 19",
                "address" => "Yopougon - Toit Rouge",
                "map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.646786452097!2d-4.092566026031858!3d5.317671436002372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1c1000b6b5495%3A0x4890072ae289dead!2sEPI%20STORE%20SARL!5e0!3m2!1sfr!2sci!4v1760116036524!5m2!1sfr!2sci",
            ]
        );
    }
}
