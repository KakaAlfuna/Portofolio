<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'nomor_tlp'];

    public function nameClass()
    {
        return $this->belongsTo(NameClass::class, 'class_id');
    }
}
