<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;

class ExpensesDropdown extends Component
{
    public $levels = [], $grades;
    public $level_id, $grade_id;

    public function mount($grades, $data = null)
    {
        $this->grades = $grades;
        if ($data) {
            $this->grade_id = $data->grade_id;
            $this->level_id = $data->level_id;
        }
    }
    public function render()
    {
        $levels = $this->levels;

        if (!empty($this->grade_id)) {
            $this->levels = Level::where('grade_id', $this->grade_id)->get();
        }
        return view('livewire.expenses-dropdown', compact('levels'));
    }
}
