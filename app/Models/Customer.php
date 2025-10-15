<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'email',
        'number',
        'status',
        'numrecu',
        'username',
        'proforma',
    ];

    public static function receiptnumber() {
        // Année actuelle
        $year = date('y');
        // Récupération du dernier enregistrement
        $count = self::where('status', 1)
        ->whereYear('created_at', '20' . $year)
        ->count();
        // Initialisation du numéro
        $num = $count + 1;
        // Retourner le nouveau numéro formaté
        return sprintf('%03d', $num) . '/' . $year;
    }
    
    //Génération de Proforma unique
    public static function proformaUnique()
    {
        do {
            $alfa = 'abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ0123456789';
            $string = substr(str_shuffle($alfa), 0, 15) . '.pdf';
        } while(self::where('proforma', $string)->exists());
        return $string;
    }
}
