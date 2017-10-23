<?php

namespace App\Http\Requests;

use Sentinel;

/**
 * Class PostProfileRequest
 * @package App\Http\Requests
 */
class PostProfileRequest extends Request
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
            'last_name' => 'required|string|max:100|min:'
        ];
    }
}