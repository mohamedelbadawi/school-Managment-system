<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateExpenseRquest extends FormRequest
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
            'amount' => 'required|min:0',
            'title_ar' => 'required',
            'title_en' => 'required',
            'year' => 'required',
            'grade_id' => 'required',
            'level_id' => 'required',
            'description' => 'nullable',
        ];
    }
}
