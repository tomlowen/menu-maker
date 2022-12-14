<?php

namespace App\Http\Requests;

use App\Rules\existingCategory;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
            'recipeId' => [
                'sometimes',
                'nullable',
                'integer',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'author' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
            ],
            'source' => [
                'sometimes',
                'nullable',
                'url',
                'max:255',
            ],
            'description' => [
                'sometimes',
                'nullable',
                'string',
                'max:2000',
            ],
            'steps' => [
                'required',
                'array',
            ],
            'yield' => [
                'required',
                'integer',
            ],
            'prepTime' => [
                'sometimes',
                'nullable',
                'integer',
            ],
            'cookTime' => [
                'sometimes',
                'nullable',
                'integer',
            ],
            'rating' => [
                'sometimes',
                'nullable',
                'numeric',
            ],
            'calories' => [
                'sometimes',
                'nullable',
                'max:255',
            ],
            'categories' => [
                'required',
                'array',
            ],
            'categories.*' => [
                new existingCategory($this->user()),
            ],
            'ingredients' => [
                'required',
                'array',
            ],
            'image' => [
                'sometimes',
                'nullable',
                'image',
                'max:10240' //10 mb
            ],
            'imageUrl' => [
                'sometimes',
                'nullable',
                'string',
            ],
        ];
    }
}
