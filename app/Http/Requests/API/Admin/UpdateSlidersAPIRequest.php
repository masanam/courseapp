<?php

namespace App\Http\Requests\API\Admin;

use App\Models\Admin\Sliders;
use InfyOm\Generator\Request\APIRequest;

class UpdateSlidersAPIRequest extends APIRequest
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
        $rules = Sliders::$rules;
        
        return $rules;
    }
}
