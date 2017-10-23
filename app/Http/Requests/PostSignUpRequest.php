<?php

namespace App\Http\Requests;

use Sentinel;

/**
 * Class PostSignUpRequest
 * @package App\Http\Requests\Clients
 */
class PostSignUpRequest extends Request
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
            'first_name' => 'required|string|max:100|min:2',
            'last_name' => 'required|string|max:100|min:2',
            'email' => 'required|string|email|unique:users|min:6',
            'password' => 'required|confirmed|string|min:6',
            'password_confirmation' => 'required|min:6'
        ];
    }
}