<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];





    public function classrooms()
    {
        return $this->belongsToMany(ClassRoom::class);
    }
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
