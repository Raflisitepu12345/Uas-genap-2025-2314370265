<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    protected $fillable = [
    'title',
    'author',
    'description',
    'publisher',
    'year',
    'stock',
];

}
