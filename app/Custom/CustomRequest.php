<?php

namespace App\Custom;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomRequest extends FormRequest
{

    /**
     * Validation Failed.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendError($validator->errors(),422));
    }

}
