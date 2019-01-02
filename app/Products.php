<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //

    protected $fillable=([
    'name',
    'model',
    'description',
    'price',
    'image',
    'category_id'
]);
}
