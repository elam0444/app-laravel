<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Auth
 */
class LoginRequest extends Request
{

    /**
     * The route to redirect to if validation fails
     *
     * @var string
     */
    protected $redirectRoute = "auth.login";

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
            'email' => 'required|exists:users,email,deleted_at,NULL|max:50',
            'password' => 'required|max:50',
        ];
    }
}
