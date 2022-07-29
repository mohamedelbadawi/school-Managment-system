<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Level;
use Livewire\Component;

class AddClassroom extends Component
{
    public $grade_id;
    public $grades;
    public $level_id;
    public $levels = [];

    public function mount($grades)
    {
        $this->grades = $grades;
    }

    public function render()
    {
        $grades = $this->grades;
        if (!empty($this->grade_id)) {
            $this->levels = Level::where('grade_id', $this->grade_id)->get();
        }
        return view('livewire.add-classroom', compact('grades'));
    }
}
