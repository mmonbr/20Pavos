<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $id = auth()->user()->id;

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => 'required|unique:categories',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'username' => 'required|unique:users,username,' . $id,
                    'email'    => 'required|email|unique:users,email,' . $id,
                    'password' => 'confirmed',
                ];
            }
            default:
                break;
        }
    }
}
