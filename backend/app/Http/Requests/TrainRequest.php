<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class TrainRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "route" => "required|string|unique:trains",
            "class" => "required",
            "price" => "required|integer",
            "date" => "required|date",
            "start" => "required",
            "finish" => "required",
            "capacity" => "required|integer",
        ];
    }

    public function messages()
    {
        return [
            "required" => "The :attribute field is required.",
            "integer" => "The :attribute field must be an integer.",
            "unique" => "The :attribute field is unique",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            "status" => 422,
            "message" => "input data failed",
            "errors" => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, 422));
    }
}
