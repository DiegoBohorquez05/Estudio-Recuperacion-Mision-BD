<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'type',
        'name',
        'area_id',
        'teacher_id'
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
