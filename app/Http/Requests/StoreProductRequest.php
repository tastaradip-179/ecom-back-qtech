<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
       // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'code' => 'required|string|min:3|max:255|unique:products',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required',
            'seller_id' => 'required',
            'warranty' => 'required',
            'image'=> 'mimes:jpeg,jpg,png,gif|max:1000'
        ];
    }
}
