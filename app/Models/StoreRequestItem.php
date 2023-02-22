<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreRequestItem extends Model
{
    use HasFactory;

    protected $fillable = ['store_request_id','item_size_id','qty','remark'];

    public function store_request()
    {
        return $this->belongsTo(StoreReuqest::class);
    }

    // each request item belogs to item_size_id
    public function itemSize()
    {
        return $this->belongsTo(ItemSize::class);
    }


}
