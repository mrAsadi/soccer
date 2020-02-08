<?php

namespace App\Http\Requests;

use App\Utility\APIRequest;

class CreatePlayerRequest extends APIRequest
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
            'teams' => 'array',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|min:1',
            'name' => 'required',
            'lastname' => 'required',
            'height' => 'numeric|between:1.0,3.0',
            'age' => 'numeric|min:1|max:120',
            'weight' => 'numeric|between:10,300',
        ];
    }
}
