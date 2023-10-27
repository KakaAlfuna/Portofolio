<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameClass extends Model
{
    use HasFactory;

    protected $fillable = ["name_class", "description"];

    public function members()
    {
        return $this->hasMany(Member::class, 'class_id');
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'class_id');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'class_id');
    }

}
