<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupUpdateRequest extends FormRequest
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
            'days'=>'in:MondayToFriday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'starthour'=>'required',
            'finalhour'=>'required',
            'firstdate'=>'required',
            'teacher_id'=>'required',
        ];
    }
}
