<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * @var mixed
     */
    private $password;

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
        $paramsToValidate = [
            'email'   => [
                'required',
                'string',
//                'unique:users,email'
                isset($this->user) ? Rule::unique('users')->ignore($this->user->id) : 'unique:users,email',
            ],
            'name'     => [
                'required',
                'string',
            ],
            'phone'     => [
                'required',
                'string',
            ],
            'password' => [
                $this->user == null ? 'required' : '',
                'string',
            ],
        ];
        return $paramsToValidate;
    }
}
