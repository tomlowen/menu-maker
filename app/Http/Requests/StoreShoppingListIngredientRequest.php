<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShoppingListIngredientRequest extends FormRequest
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
            'shoppingListIngredient' => [
                'required',
                'array',
            ],
            'shoppingListIngredient.id' => [
                'required',
                'integer',
                'exists:shopping_list_ingredients,id'
            ],
            'shoppingListIngredient.bought' => [
                'required',
                'boolean',
            ],
            'shoppingListIngredient.name' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
