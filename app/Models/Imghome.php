<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imghome extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'libelle',
        'filename',
    ];
    
    public $timestamps = false;
}
