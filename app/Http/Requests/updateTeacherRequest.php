<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en' => 'required',
            'name_ar' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $this->teacher->id,
            'password' => 'required|min:8',
            'specialization_id' => 'required',
            'gender_id' => 'required',
            'joining_date' => 'required',

        ];
    }
}
