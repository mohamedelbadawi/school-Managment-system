<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddAttachment extends Component
{
    public  $attachments = [], $student;
    use WithFileUploads;
    protected $rules = [

        'attachments' => 'required',


    ];
    public function mount($student)
    {
        $this->student = $student;
    }

    public function upload()
    {
        $this->validate();
        try {

            if (!empty($this->attachments)) {
                foreach ($this->attachments as $attachment) {
                    $attachment->storeAs($this->student->id, $attachment->getClientOriginalName(), $disk = 'student_attachments');
                    Image::create(['name' => $attachment->getClientOriginalName(), 'imageable_id' => $this->student->id, 'imageable_type' => Student::class]);
                }
            }
            $this->emit('attachmentUploaded');
            $this->dispatchBrowserEvent(
                'alert',

                ['type' => 'success',  'message' => 'Attachments uploaded Successfully!']
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
        return view('livewire.add-attachment');
    }
}
