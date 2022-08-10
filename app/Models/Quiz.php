<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function level()
    {
        return $this->belongsTo(level::class);
    }
    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function questionsCount()
    {
        return $this->hasMany(Question::class)->count();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
