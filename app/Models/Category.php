<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'store_id'];



    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function items()
    {
       return $this->hasMany(Item::class, 'category_id');
    }
}
