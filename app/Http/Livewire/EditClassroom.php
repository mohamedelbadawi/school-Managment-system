<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;

class EditClassroom extends Component
{
    public $grade_id;
    public $grades;
    public $level_id;
    public $levels = [], $selectedTeachers = [];
    public $classroom;


    public function mount($classroom, $grades)
    {
        $this->classroom = $classroom;
        $this->grades = $grades;
        $this->grade_id = $this->classroom->grade_id;
        $this->level_id = $this->classroom->level_id;
    }
    public function render()
    {
        $grades = $this->grades;
        if (!empty($this->grade_id)) {
            $this->levels = Level::where('grade_id', $this->grade_id)->get();
        }
        $classroom = $this->classroom;
        return view('livewire.edit-classroom', compact('classroom', 'grades'));
    }
}
