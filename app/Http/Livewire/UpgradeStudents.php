<?php

namespace App\Http\Livewire;

use App\Models\ClassRoom;
use App\Models\Level;
use App\Models\Student;
use App\Models\Upgrade;
use Facade\Ignition\DumpRecorder\DumpHandler;
use Livewire\Component;

class UpgradeStudents extends Component
{
    public $levels_nw = [], $classrooms_nw = [], $grades_nw;
    public $levels_pr = [], $classrooms_pr = [], $grades_pr;
    public $level_id_nw, $grade_id_nw, $classroom_id_nw;
    public $level_id_pr, $grade_id_pr, $classroom_id_pr;

    public function mount($grades)
    {
        $this->grades = $grades;
    }


    public function upgrade()
    {
        try {

            $students = Student::where('class_room_id', $this->classroom_id_pr)->get();
            foreach ($students as $student) {
                $student->update(['class_room_id' => $this->classroom_id_nw, 'grade_id' => $this->grade_id_nw, 'level_id' => $this->level_id_nw]);
                Upgrade::updateOrCreate([
                    'student_id' => $student->id, 'from_grade' => $this->grade_id_pr, 'from_classroom' => $this->classroom_id_pr, 'from_level' => $this->level_id_pr,
                    'to_grade' => $this->grade_id_nw, 'to_level' => $this->level_id_nw, 'to_classroom' => $this->classroom_id_nw
                ]);
            }
            $this->dispatchBrowserEvent(
                'alert',

                ['type' => 'success',  'message' => 'students upgraded successfully']
            );
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent(
                'alert',

                ['type' => 'error',  'message' => 'some thing error !']
            );
        }
    }
    public function render()
    {
        $levels_pr = $this->levels_pr;
        $levels_nw = $this->levels_nw;
        $classrooms_nw = $this->classrooms_nw;
        $classrooms_pr = $this->classrooms_pr;

        if (!empty($this->grade_id_nw)) {
            $this->levels_nw = Level::where('grade_id', $this->grade_id_nw)->get();
        }
        if (!empty($this->grade_id_pr)) {
            $this->levels_pr = Level::where('grade_id', $this->grade_id_pr)->get();
        }
        if (!empty($this->level_id_nw)) {
            $this->classrooms_nw = ClassRoom::where('grade_id', $this->grade_id_nw)->where('level_id', $this->level_id_nw)->get();
        }
        if (!empty($this->level_id_pr)) {
            $this->classrooms_pr = ClassRoom::where('grade_id', $this->grade_id_pr)->where('level_id', $this->level_id_pr)->get();
        }
        return view('livewire.upgrade-students', compact('levels_pr', 'levels_nw', 'classrooms_nw', 'classrooms_pr'));
    }
}
