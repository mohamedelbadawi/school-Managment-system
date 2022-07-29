<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name', 'note'];
    public $translatable = ['name'];


    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function classrooms()
    {
        return $this->hasMany(ClassRoom::class);
    }
}
