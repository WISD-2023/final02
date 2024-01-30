<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsedBookRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pp' => 'required|string|max:255',
            'isbn' => 'required|string|digits:13',
            'book_state' => 'required|string|max:255',
            'book_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
            'pay_type' => 'required|integer',
            'trade_place' => 'required|integer',
            'trade_at' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|integer',
        ];
    }
}
