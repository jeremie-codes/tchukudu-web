<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'invoice_no' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sales')->ignore($this->sale),
            ],
            'customer_id' => 'nullable|exists:customers,id',
            'sale_date' => 'required|date',
            'status' => 'required|in:pending,completed,cancelled',
            'tax_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.unit_price' => 'required|numeric|min:0',
            'products.*.discount' => 'nullable|numeric|min:0',
        ];
    }
    
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'products.required' => 'At least one product must be added to the sale.',
            'products.min' => 'At least one product must be added to the sale.',
            'products.*.product_id.required' => 'Product is required.',
            'products.*.product_id.exists' => 'Selected product does not exist.',
            'products.*.quantity.required' => 'Quantity is required.',
            'products.*.quantity.integer' => 'Quantity must be a whole number.',
            'products.*.quantity.min' => 'Quantity must be at least 1.',
            'products.*.unit_price.required' => 'Unit price is required.',
            'products.*.unit_price.numeric' => 'Unit price must be a number.',
            'products.*.unit_price.min' => 'Unit price must be greater than or equal to 0.',
            'products.*.discount.numeric' => 'Discount must be a number.',
            'products.*.discount.min' => 'Discount must be greater than or equal to 0.',
        ];
    }
}