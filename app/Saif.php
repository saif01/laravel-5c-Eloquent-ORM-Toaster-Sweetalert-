<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saif extends Model
{
    protected $fillable = [
        'title', 'author', 'tag', 'description'
    ];
}
