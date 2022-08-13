<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Attendance as AttendacneModel;

class Attendance extends Component
{
    public $attendance_day, $classroom;


    public function mount($classroom)
    {
        $this->classroom = $classroom;
    }
    public function render()
    {
        $students = Student::where('class_room_id', $this->classroom->id)->get();
        $attendances = AttendacneModel::where('class_room_id', $this->classroom->id)->where('attendance_date', $this->attendance_day ? $this->attendance_day : date('Y-m-d'))->pluck('student_id')->toArray();
        // dd($attendances);
        return view('livewire.attendance', compact('students', 'attendances'));
    }
}
