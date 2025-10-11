<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sendmail extends Model
{
    public $table = 'sendmail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'status',
        'subject',
        'comment',
        'username',
    ];
}