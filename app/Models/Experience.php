<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Experience extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'experiences';
    protected $fillable = [
        'experience',
        'poste',
        'entreprise',
        'description',
        'start_date',
        'end_date',
        'lieu',
        'secteur'
             
    ];
}
