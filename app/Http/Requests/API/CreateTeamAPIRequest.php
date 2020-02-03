<?php

namespace App\Http\Requests;

use App\Utility\APIRequest;

class CreateTeamAPIRequest extends APIRequest
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
      return
          [   'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|min:1',
              'title' => 'required',
              'description' => 'required'
          ];
    }
}
