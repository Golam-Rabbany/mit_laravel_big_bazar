<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    function onetoonerelationtable(){
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }


}
