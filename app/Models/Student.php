<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Parent_;
use phpDocumentor\Reflection\Types\This;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, HasTranslations, SoftDeletes;
    use Notifiable;
    protected $guarded = [];
    public $translatable = ['name'];
    public $timestamps = false;


    public function parent()
    {
        return $this->belongsTo(StudentParent::class, 'student_parent_id');
    }
    public function nationality()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }
    public function blood()
    {
        return $this->belongsTo(BloodType::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function quizzes()
    {
        return Quiz::where('class_room_id', $this->class_room_id)->with(['questions']);
    }
    public function result()
    {
        return $this->hasMany(QuestionResult::class);
    }

    public function quizResult($quiz_id)
    {
        return $this->result->where('quiz_id', $quiz_id)->sum('points');
    }

    public function quizzesResults()
    {
        return $this->hasMany(Result::class);
    }
    

}
