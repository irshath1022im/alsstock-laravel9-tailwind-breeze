<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreReuqest extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'requestedBy','approvedBy','remark','status'];

    // public function items()
    // {
    //     return $this->hasMany(Item::class,'id');
    // }

    // public function itemSizes()
    // {
    //     return $this->hasMany(ItemSize::class,'id');
    // }


    public function storeRequestItems()
    {
        return $this->hasMany(StoreRequestItem::class, 'store_request_id');
    }



}
