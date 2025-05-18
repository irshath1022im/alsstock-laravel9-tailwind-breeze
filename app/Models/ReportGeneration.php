<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportGeneration extends Model
{
    use HasFactory;

    protected $fillable = ['generated_date','start_date','end_date','item_id','store_request_id', 'item_size_id','qty','category','store'];



    public function store_request()
    {
       return  $this->belongsTo(StoreReuqest::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function item_size()
    {
        return $this->belongsTo(ItemSize::class);
    }
}
