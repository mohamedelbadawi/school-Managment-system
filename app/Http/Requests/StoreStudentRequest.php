<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class StoreStudentRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:students',
            'date_birth' => 'required',
            'password' => 'required',
            'parent_id' => 'required',
            'blood_id' => 'required',
            'gender_id' => 'required',
            'grade_id' => 'required',
            'level_id' => 'required',
            'classroom_id' => 'required',
            'nationlitie_id' => 'required',
        ];
    }
}
