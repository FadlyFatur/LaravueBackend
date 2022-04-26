<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'      => 'required|max:255',
            'email'     => 'required|email',
            'number'    => 'required|max:255',
            'address'   => 'required',
            'trans_total' => 'required|integer',
            'trans_status' => 'nullable|string|in:PENDING,SUCCESS,FAILED',
            'trans_detail' => 'required|array',
            'trans_detail.*' => 'integer|exists:products,id'
        ];
    }
}
