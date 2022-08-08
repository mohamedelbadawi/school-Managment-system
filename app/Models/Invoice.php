<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];
    const TYPES = ['invoice'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function level()
    {
        return $this->belongsTo(level::class);
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function studentAcount()
    {
        return $this->hasMany(StudentAcount::class);
    }
}
