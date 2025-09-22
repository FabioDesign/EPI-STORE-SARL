<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'status',
        'target',
        'menu_id',
        'libelle',
        'position',
    ];

    // Requêtes pour sous-menus
    public function submenus()
    {
        return $this->hasMany(Menu::class, 'menu_id')
            ->where('status', 1)
            ->orderBy('position');
    }
    // Requêtes pour images des boutiques
    public function imgshops()
    {
        return $this->hasMany(Imgshop::class, 'shop_id');
    }
}
