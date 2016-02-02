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
                    'name'          => 'required',
                    'description'   => 'required',
                    'current_price' => 'required',
                    'referral_link' => 'required|url',
                    'product_url'   => 'url',
                    'file'          => 'required',
                    'categories'    => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name'          => 'required',
                    'description'   => 'required',
                    'current_price' => 'required',
                    'referral_link' => 'required|url',
                    'product_url'   => 'url',
                    'file'          => 'image',
                    'categories'    => 'required',
                ];
            }
            default:
                break;
        }
    }
}
