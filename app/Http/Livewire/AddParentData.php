<?php

namespace App\Http\Livewire;

use App\Models\BloodType;
use App\Models\Nationalitie;
use App\Models\Religion;
use Livewire\Component;
use App\Models\StudentParent;
use Livewire\WithFileUploads;
use App\Models\ParentAttachment;

class AddParentData extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $father_name_ar,
        $father_name_en, $father_phone,
        $email, $password,
        $father_job_ar, $father_job_en,
        $father_nationality_id, $father_religion_id,
        $father_address, $father_national_id,
        $mom_name_ar, $mom_name_en,
        $mom_job_ar,
        $mom_job_en, $mom_national_id,
        $mom_nationality_id, $mom_address,
        $mom_phone, $mom_religion_id;
    public $attachments = [];

    public function firstStep()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'father_name_ar' => 'required',
            'father_name_en' => 'required',
            'father_job_en' => 'required',
            'father_job_ar' => 'required',
            'father_nationality_id' => 'required',
            'father_religion_id' => 'required',
            'father_address' => 'required',
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'father_national_id' => 'required',



        ]);
        $this->currentStep = 2;
    }

    public function secondStep()
    {
        $this->validate([

            'mom_name_ar' => 'required',
            'mom_name_en' => 'required',
            'mom_job_en' => 'required',
            'mom_job_ar' => 'required',
            'mom_nationality_id' => 'required',
            'mom_religion_id' => 'required',
            'mom_address' => 'required',
            'mom_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mom_national_id' => 'required',

        ]);

        $this->currentStep = 3;
    }

    public function submit()
    {
        try {
            $parent = StudentParent::create(
                [
                    'email' => $this->email,
                    'password' => $this->password,
                    'father_name' => [
                        'en' => $this->father_job_en,
                        'ar' => $this->father_job_ar
                    ],
                    'father_job' => [
                        'en' => $this->father_job_en,
                        'ar' => $this->father_job_ar,
                    ],
                    'father_nationality_id' => $this->father_nationality_id,
                    'father_religion_id' => $this->father_religion_id,
                    'father_address' => $this->father_address,
                    'father_phone' => $this->father_phone,
                    'father_national_id' => $this->father_national_id,

                    'mom_name' => [
                        'ar' => $this->mom_name_ar,
                        'en' => $this->mom_name_en
                    ],
                    'mom_job' => [
                        'ar' => $this->mom_job_ar,
                        'en' => $this->mom_job_en
                    ],
                    'mom_nationality_id' => $this->mom_nationality_id,
                    'mom_religion_id' => $this->mom_religion_id,
                    'mom_address' => $this->mom_address,
                    'mom_phone' => $this->mom_phone,
                    'mom_national_id' => $this->mom_national_id,
                ]

            );

            if (!empty($this->attachments)) {
                foreach ($this->attachments as $attachment) {
                    $attachment->storeAs($this->father_national_id, $attachment->getClientOriginalName(), $disk = 'parent_attachments');
                    ParentAttachment::create(['name' => $attachment->getClientOriginalName(), 'student_parent_id' => $parent->id]);
                }
            }
            $this->clearForm();
            $this->currentStep = 1;
            $this->dispatchBrowserEvent(
                'alert',

                ['type' => 'success',  'message' => 'Parent Created Successfully!']
            );
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent(
                'alert',

                ['type' => 'error',  'message' => 'Parent can\'t created now']
            );
        }
    }

    public function clearForm()
    {
        $this->father_name_ar = '';
        $this->father_name_en = '';
        $this->father_phone = '';
        $this->email = '';
        $this->password = '';
        $this->father_job_ar = '';
        $this->father_job_en = '';
        $this->father_nationality_id = '';
        $this->father_religion_id = '';
        $this->father_address = '';
        $this->father_national_id = '';
        $this->mom_name_ar = '';
        $this->mom_name_en = '';
        $this->mom_job_ar = '';
        $this->mom_job_en = '';
        $this->mom_national_id = '';
        $this->mom_nationality_id = '';
        $this->mom_address = '';
        $this->mom_phone = '';
        $this->mom_religion_id = '';
        $this->attachments = '';
    }

    public function render()
    {
        $Nationalities = Nationalitie::all();

        $Religions = Religion::all();
        return view('livewire.add-parent-data', compact('Nationalities', 'Religions'));
    }
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
