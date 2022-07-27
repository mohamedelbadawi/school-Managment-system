<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Level extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name', 'grade_id'];
    public $translatable = ['name'];


    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
