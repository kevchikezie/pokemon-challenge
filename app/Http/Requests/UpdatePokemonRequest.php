<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePokemonRequest extends FormRequest
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
            'pokemon_name' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'height' => ['required', 'integer'],
            'base_experience' => ['required', 'integer'],
            'region' => ['required', 'integer'],
            'generation' => ['required', 'integer'],
            'habitat' => ['required', 'integer'],
            'color' => ['required', 'integer'],
            'shape' => ['required', 'integer'],
        ];
    }
}
