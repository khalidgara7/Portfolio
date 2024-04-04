<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foramation extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'formations';
    protected $fillable = [
        'formation',
        'diplome',
        'niveau',
        'mention',
        'specialite',
        'description',
        'start_date',
        'end_date',
        'lieu'
             
    ];
}
