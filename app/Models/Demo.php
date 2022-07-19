<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Demoproduct;

class Demo extends Model
{
    use HasFactory;

    public function demoproduct(){
        return $this->hasMany(Demoproduct::class, 'category_id');
    }

}
