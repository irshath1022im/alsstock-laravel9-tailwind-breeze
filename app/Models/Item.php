<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    use HasFactory;

    protected $fillable = ['item', 'category_id', 'thumbnail','user_id'];

    public function itemSize()
    {
        return $this->hasMany(ItemSize::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }




    public function itemTransectionLogs()
    {
        return $this->hasManyThrough(
            ItemTransectionLog::class,
            ItemSize::class,
            'item_id',
            'item_size_id',
            'id'
        );

        
    }





}
