<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Parent_;
use phpDocumentor\Reflection\Types\This;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];
    public $timestamps = false;


    public function parent()
    {
        return $this->belongsTo(StudentParent::class,'student_parent_id');
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
}
