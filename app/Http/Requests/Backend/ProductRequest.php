<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
                    'name'              => 'required',
                    'short_description' => 'required',
                    'long_description'  => 'required',
                    'current_price'     => 'required',
                    'referral_link'     => 'required|url',
                    'file'              => 'required',
                    'categories'        => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name'              => 'required',
                    'short_description' => 'required',
                    'long_description'  => 'required',
                    'current_price'     => 'required',
                    'referral_link'     => 'required|url',
                    //'file'              => 'required',
                    'categories'        => 'required',
                ];
            }
            default:
                break;
        }
    }
}
