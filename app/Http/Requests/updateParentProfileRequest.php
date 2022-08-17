<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateParentProfileRequest extends FormRequest
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
            'name_mom_ar' => 'required',
            'name_mom_en' => 'required',
            'name_fa_ar' => 'required',
            'name_fa_en' => 'required',
            'password' => 'nullable'
        ];
    }
}
