<?php

namespace App\Http\Requests\Api;

use App\Custom\CustomRequest;

class RoleRequest extends CustomRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role'=>'required|string|unique:roles,role'
        ];
    }
}
