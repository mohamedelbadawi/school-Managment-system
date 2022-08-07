<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    use HasFactory;
    public $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function previousGrade()
    {
        return $this->belongsTo(Grade::class, 'from_grade');
    }
    public function currentGrade()
    {
        return $this->belongsTo(Grade::class, 'to_grade');
    }
    public function currentLevel()
    {
        return $this->belongsTo(Level::class, 'to_level');
    }
    public function previousLevel()
    {
        return $this->belongsTo(Level::class, 'from_level');
    }
    public function previousClassroom()
    {
        return $this->belongsTo(ClassRoom::class, 'from_classroom');
    }
    public function currentClassroom()
    {
        return $this->belongsTo(ClassRoom::class, 'to_classroom');
    }
}
