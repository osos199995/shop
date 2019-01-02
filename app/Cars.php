<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable=([
        'name',
        'model',
        'description',
        'price',
        'image',
        'category_id'
    ]);



    public function categories(){
        return $this->belongsTo('App\AdminCategories','category_id');
    }
}
