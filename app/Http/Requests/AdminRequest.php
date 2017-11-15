<?php

namespace App\Http\Requests;

use App\Http\Requests\LoggedInRequest;

class AdminRequest extends LoggedInRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $parent = parent::authorize();
        $userData = $this->userData;
        if(!$parent || $userData == '') {
            return false;
        }
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
            //
        ];
    }
}
