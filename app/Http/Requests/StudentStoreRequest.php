<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'name'=>'required',
            'lastname'=>'required',
            'birthday'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'phonenumber'=>'required|digits:10',
            'tutors_id'=>'nullable',
            'group_id'=>'required',
        ];
    }
}
