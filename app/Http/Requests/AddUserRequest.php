<?php

namespace App\Http\Requests;

use App\Http\Requests\SuRequest;

class AddUserRequest extends SuRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return parent::authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname'  =>  'required',
            'username'  =>  'required|unique:users,username',
            'password'  =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'is_admin'  =>  'boolean',
        ];
    }
}
