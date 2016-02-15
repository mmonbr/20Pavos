<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
                    'name' => 'required|unique:categories,name,'.$this->id,
                    'slug' => 'required|unique:categories,slug,'.$this->id,
                ];
            }
            default:
                break;
        }
    }
}
