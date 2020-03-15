<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        //dd($this->user()->id);
        //dd($this->route('user')->id);
        $rules = [
            'run' => 'required',
            'name' => 'required',
            'email' => ['required', 
                    Rule::unique('users')->ignore($this->route('user')->id)
            ],
            'adress' => 'nullable',
            'phone' => 'nullable',
            'movil' => 'nullable',
        ];
        if($this->filled('password')){
            $rules['password'] = ['confirmed', 'min:6'];
        }
        return $rules;
    }
}
