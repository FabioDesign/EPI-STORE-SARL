<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Menu::firstOrCreate(
            ["code" => 'clothes'],
            [
                "libelle" => "Vêtements",
                "target" => '#',
                "position" => 1,
                "menu_id" => 0,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'lowerbody'],
            [
                "libelle" => "Bas du corps",
                "target" => '#lowerbody',
                "position" => 1,
                "menu_id" => 1,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'upperbody'],
            [
                "libelle" => "Haut du corps",
                "target" => '#upperbody',
                "position" => 2,
                "menu_id" => 1,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'highvisibility'],
            [
                "libelle" => "Haute visibilité",
                "target" => '#highvisibility',
                "position" => 3,
                "menu_id" => 1,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'aprons'],
            [
                "libelle" => "Tabliers",
                "target" => '#aprons',
                "position" => 4,
                "menu_id" => 1,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'shoes'],
            [
                "libelle" => "Chaussures",
                "target" => '#',
                "position" => 3,
                "menu_id" => 0,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'lowshoes'],
            [
                "libelle" => "Basses",
                "target" => '#lowshoes',
                "position" => 1,
                "menu_id" => 6,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'highshoes'],
            [
                "libelle" => "Hautes",
                "target" => '#highshoes',
                "position" => 2,
                "menu_id" => 6,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'boots'],
            [
                "libelle" => "Bottes",
                "target" => '#boots',
                "position" => 3,
                "menu_id" => 6,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'heads'],
            [
                "libelle" => "Têtes",
                "target" => '#',
                "position" => 4,
                "menu_id" => 0,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'glasses'],
            [
                "libelle" => "Lunettes de protection",
                "target" => '#glasses',
                "position" => 1,
                "menu_id" => 10,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'visors'],
            [
                "libelle" => "Visières de protection",
                "target" => '#visors',
                "position" => 2,
                "menu_id" => 10,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'workhelmet'],
            [
                "libelle" => "Casques de travail",
                "target" => '#workhelmet',
                "position" => 3,
                "menu_id" => 10,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'earplugs'],
            [
                "libelle" => "Bouchon d'oreilles",
                "target" => '#earplugs',
                "position" => 4,
                "menu_id" => 10,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'headphones'],
            [
                "libelle" => "Casques anti bruits",
                "target" => '#headphones',
                "position" => 5,
                "menu_id" => 10,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'gloves'],
            [
                "libelle" => "Gants",
                "target" => '#',
                "position" => 5,
                "menu_id" => 0,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'disposglove'],
            [
                "libelle" => "Gants à usage unique",
                "target" => '#disposglove',
                "position" => 1,
                "menu_id" => 16,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'leathglove'],
            [
                "libelle" => "Gants cuirs manutentions",
                "target" => '#leathglove',
                "position" => 2,
                "menu_id" => 16,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'synthetic'],
            [
                "libelle" => "Gants synthétiques",
                "target" => '#synthetic',
                "position" => 3,
                "menu_id" => 16,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'vinylglove'],
            [
                "libelle" => "Gants vinyles",
                "target" => '#vinylglove',
                "position" => 4,
                "menu_id" => 16,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'masks'],
            [
                "libelle" => "Masques",
                "target" => '#',
                "position" => 6,
                "menu_id" => 0,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'protekmask'],
            [
                "libelle" => "Masques de protection",
                "target" => '#protekmask',
                "position" => 1,
                "menu_id" => 21,
            ]
        );
        Menu::firstOrCreate(
            ["code" => 'dispomask'],
            [
                "libelle" => "Masques jetables",
                "target" => '#dispomask',
                "position" => 2,
                "menu_id" => 21,
            ]
        );
    }
}
