<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'lastname',
        'document',
        'age',
        'area_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function course(){
        return $this->hasMany(Course::class);
    }
}
