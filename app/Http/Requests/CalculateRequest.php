<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateRequest extends FormRequest
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
            'lendprice' => 'required|numeric|min:0|max:350000000',
            'lendmonth' => 'required',
            'lendtype' => 'required',
        ];
    }

    public function messages() {
        return [
            'lendprice.required' => 'مقدار وام را وارد کنید',
            'lendprice.numeric' => 'مبلغ وام باید عددی باشد',
            'lendprice.min' => 'مبلغ وام باید بیشتر از 0 باشد',
            'lendprice.max' => 'مبلغ وام باید کمتر از 350000000 باشد',
            'lendmonth.required' => 'مدت اقساط را وارد کنید',
            'lendtype.required' => 'نوع اقساط را انتخاب کنید',
        ];
    }
}
