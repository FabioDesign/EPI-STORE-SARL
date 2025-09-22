<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'shop_id',
        'filename',
    ];
    
    public $timestamps = false;
    
}
