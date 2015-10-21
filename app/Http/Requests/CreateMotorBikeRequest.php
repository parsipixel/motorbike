<?php

namespace App\Http\Requests;

class CreateMotorBikeRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'color' => 'required',
            'price' => 'numeric'
        ];
    }
}
