<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudentParent extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    public $translatable = ['father_name', 'mom_name', 'father_job', 'mom_job'];
}
