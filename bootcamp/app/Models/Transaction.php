<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class, 'class_id');
    }
    public function nameClass()
    {
        return $this->belongsTo(NameClass::class, 'class_id');
    }
}
