<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentAttachments extends Component
{
    use WithFileUploads;
    public $student;
    protected $listeners = ['attachmentUploaded' => 'render'];

    public function mount($student)
    {
        $this->student = $student;
    }

    public function download($attachment)
    {
        return  Storage::disk('student_attachments')->download($this->student->id . '/' . $attachment);
    }

    public function delete($attachment, $attachmentId)
    {
        if (Storage::disk('student_attachments')->exists($this->student->id . '/' . $attachment)) {
            Storage::disk('student_attachments')->delete($this->student->id . '/' . $attachment);
            $image = Image::findOrFail($attachmentId);
            $image->delete();
            $this->emit('attachmentUploaded');
            $this->dispatchBrowserEvent(
                'alert',

                ['type' => 'success',  'message' => 'Attachments deleted Successfully!']
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',

                ['type' => 'error',  'message' => 'some thing error !']
            );
        }
    }
    public function render()
    {
        return view('livewire.student-attachments');
    }
}
