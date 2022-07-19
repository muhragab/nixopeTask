<?php

namespace App\Http\Requests\Api;

use App\Custom\CustomRequest;

class AssignRoleRequest extends CustomRequest
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
            'role_id'=>'required|string|exists:roles,id',
            'user_id'=>'required|string|exists:users,id'
        ];
    }
}
