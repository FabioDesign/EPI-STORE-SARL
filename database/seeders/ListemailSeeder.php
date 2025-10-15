<?php

namespace Database\Seeders;

use App\Models\Listemail;
use Illuminate\Database\Seeder;

class ListemailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Listemail::firstOrCreate(
            ["email" => 'info@epistores.com'],
            ["status" => 1]
        );
        Listemail::firstOrCreate(
            ["email" => 'epistore.ci@gmail.com'],
            ["status" => 2]
        );
        Listemail::firstOrCreate(
            ["email" => 'fabrice225@yopmail.com'],
            ["status" => 2]
        );
    }
}
