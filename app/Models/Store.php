<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasMany(Category::class);
    }


    public function items(){
        return $this->hasManyThrough(
                Item::class,  //grap the data from item table
                Category::class, //using category tablel
               'store_id',    // store_id in category table
               'category_id', // category_id in item table
               'id'
        );
    }

}
