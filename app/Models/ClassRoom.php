<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRoom extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name', 'level_id', 'grade_id', 'status'];
    public $translatable = ['name'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
