<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Level;
use Livewire\Component;

class LevelGradeFilter extends Component
{
    

    public function render()
    {
        $levels = Level::with(['grade'])->where('grade_id', $this->grade_id)->get();
        $grades = Grade::all();
        return view('livewire.level-grade-filter', compact('grades', 'levels'));
    }
}
