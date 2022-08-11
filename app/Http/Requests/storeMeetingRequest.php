<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeMeetingRequest extends FormRequest
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
            'title' => 'required',
            'grade_id' => 'required',
            'level_id' => 'required',
            'classroom_id' => 'required',
            'subject_id' => 'required',
            'start_at' => 'required',

        ];
    }
}
