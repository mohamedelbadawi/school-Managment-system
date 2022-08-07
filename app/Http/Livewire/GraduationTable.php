<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class GraduationTable extends Component
{


    public function cancelGraduation($studentId)
    {
        Student::withTrashed()->find($studentId)->restore();

        $this->dispatchBrowserEvent(
            'alert',

            ['type' => 'success',  'message' => 'graduation cacnceled successfully']
        );
    }
    public function deleteGraduation($studentId)
    {
         Student::withTrashed()->find($studentId)->forceDelete();
        $this->dispatchBrowserEvent(
            'alert',

            ['type' => 'success',  'message' => 'graduation deleted successfully']
        );
    }
    public function render()
    {
        $students = Student::onlyTrashed()->with(['gender', 'nationality', 'parent'])->get();
        // dd($students);
        return view('livewire.graduation-table', compact('students'));
    }
}
