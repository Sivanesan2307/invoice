<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            'client_name' => 'required|string|max:255',
            'email' => 'required|email',
            'item_description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price_per_item' => 'required|numeric|min:0',
            'tax_percentage' => 'required|numeric|min:0',
        ];
    }
}
