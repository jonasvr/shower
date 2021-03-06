<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddDeviceRequest extends Request
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
            'device_code' => 'required|exists:devices,device_code,koten_id,0',
            'name' => 'required',
        ];
    }
}
