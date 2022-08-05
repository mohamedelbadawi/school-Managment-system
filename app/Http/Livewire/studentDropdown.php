<?php

namespace App\Http\Livewire;

use App\Models\ClassRoom;
use App\Models\Level;
use App\Models\Student;
use Livewire\Component;

class studentDropdown extends Component
{
    public $levels = [], $classrooms = [], $grades;
    public $level_id, $grade_id, $classroom_id;
    public  $student;

    public function mount($grades, $student = null)
    {
        $this->grades = $grades;
        $this->student = $student;
        if ($student) {
            $this->grade_id = $student->grade_id;
            $this->level_id = $student->level_id;
            $this->classroom_id = $student->class_room_id;
        }
    }
    public function render()
    {
        $levels = $this->levels;
        $classrooms = $this->classrooms;

        if (!empty($this->grade_id)) {
            $this->levels = Level::where('grade_id', $this->grade_id)->get();
        }
        if (!empty($this->level_id)) {
            $this->classrooms = ClassRoom::where('grade_id', $this->grade_id)->where('level_id', $this->level_id)->get();
        }
        return view('livewire.student-dropdown', compact('levels', 'classrooms'));
    }
}
