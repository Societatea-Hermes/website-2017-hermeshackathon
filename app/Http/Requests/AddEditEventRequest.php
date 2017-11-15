<?php

namespace App\Http\Requests;

use App\Http\Requests\AdminRequest;

class AddEditEventRequest extends AdminRequest
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
            'id'            =>  'numeric',
            'title'         =>  'required',
            'description'   =>  'required',
            'type'          =>  'required|max:3|min:1',
            'date'          =>  'required',
            'time'          =>  'required',
            'location'      =>  'required'
        ];
    }
}
