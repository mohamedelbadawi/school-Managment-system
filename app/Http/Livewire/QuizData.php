<?php

namespace App\Http\Livewire;

use App\Models\ClassRoom;
use App\Models\Level;
use App\Models\Subject;
use Livewire\Component;

class QuizData extends Component
{

    public $levels = [], $subjects = [], $grades, $classrooms = [];
    public $level_id, $grade_id, $subject_id, $classroom_id;
    public  $data;

    public function mount($grades, $data = null)
    {
        $this->grades = $grades;
        $this->student = $data;

        if ($data) {
            $this->grade_id = $data->grade_id;
            $this->level_id = $data->level_id;
            $this->classroom_id = $data->classroom_id;
        }
    }


    public function render()
    {
        $levels = $this->levels;
        $subjects = $this->subjects;
        $classrooms = $this->classrooms;
        if (!empty($this->grade_id)) {
            $this->levels = Level::where('grade_id', $this->grade_id)->get();
        }
        if (!empty($this->level_id)) {
            $this->subjects = Subject::where('level_id', $this->level_id)->where('teacher_id', auth()->guard('teacher')->id())->get();
            $this->classrooms = ClassRoom::where('level_id', $this->level_id)->where('grade_id', $this->grade_id)->get();
        }

        return view('livewire.quiz-data', compact('levels', 'subjects', 'classrooms'));
    }
}
