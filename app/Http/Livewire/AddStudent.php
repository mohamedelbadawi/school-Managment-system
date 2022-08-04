<?php

namespace App\Http\Livewire;

use App\Models\ClassRoom;
use App\Models\Level;
use Livewire\Component;

class AddStudent extends Component
{

    public $genders, $nationalities, $bloodTypes, $parents, $grades;
    public $levels = [], $classrooms = [];
    public $level_id, $grade_id;

    public function mount($genders, $nationalities, $bloodTypes, $parents, $grades)
    {
        $this->genders = $genders;
        $this->nationalities = $nationalities;
        $this->bloodTypes = $bloodTypes;
        $this->parents = $parents;
        $this->grades = $grades;
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


        return view('livewire.add-student', compact('levels', 'classrooms'));
    }
}
