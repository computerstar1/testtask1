<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'order',
    ];
    public $primaryKey = 'id';

    public $timestamps = true;
}
