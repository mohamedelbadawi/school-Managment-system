<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class Meeting extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class,'class_room_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
