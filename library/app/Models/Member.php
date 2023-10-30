<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name','gender','email','phone_number','address'];
    public function books()
    {
        return $this->hasMany('App\Models\Book','member_id'); 
    }
    public function transactions()
    {
        return $this->hasMany('App\Models\Transactoin','member_id'); 
    }
}
