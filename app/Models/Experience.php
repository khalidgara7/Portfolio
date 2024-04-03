<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'experience';
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
