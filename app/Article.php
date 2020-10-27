<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ['title', 'body'];

    protected $casts = [
        'tags' => 'json',
    ];

}
