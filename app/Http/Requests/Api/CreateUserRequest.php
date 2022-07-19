<?php

namespace App\Http\Requests\Api;

use App\Custom\CustomRequest;

class CreateUserRequest extends CustomRequest
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
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string',
        ];
    }
}
