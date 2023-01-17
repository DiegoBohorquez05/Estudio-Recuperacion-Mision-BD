<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id'
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

    public function course(){
        return $this->hasMany(Course::class);
    }
}
