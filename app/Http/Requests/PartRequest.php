<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'price' => 'required',
            'quantity' => 'required',
            'sku' => 'required',
            'title' => 'required',
            'comment' => 'max:40',
            'part_code' => 'required',
            'category_id' => 'required',
            'manufacture_id' => 'required',
            'car_id' => 'required',
            'condition' => 'max:20'

        ];
    }
}
