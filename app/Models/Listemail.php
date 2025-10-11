<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listemail extends Model
{
    public $table = 'listemail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'status',
    ];
    
    public $timestamps = false;
}