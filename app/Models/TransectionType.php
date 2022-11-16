<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransectionType extends Model
{
    use HasFactory;

    public function transectionLogs()
    {
        return $this->hasMany(ItemTransectionLog::class, 'transection_type');
    }
}
