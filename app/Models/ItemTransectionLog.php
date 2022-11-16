<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransectionLog extends Model
{
    use HasFactory;

    protected $fillable = ['date','item_size_id', 'remark', 'transection_type', 'qty'];

    public function itemSize()
    {
        return $this->belongsTo(ItemSize::class);
    }

    public function transectionType()
    {
        return $this->belongsTo(TransectionType::class, 'transection_type');
    }
}
