<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'price' => 'required',
            'count' => 'required',
            'preview_image' => 'nullable',
            'is_publiched' => 'nullable',
            'category_id' => 'nullable',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
            'images' => 'nullable|array',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Наименование" обязательно для заполнения',
            'description.required' => 'Поле "Описание" обязательно для заполнения',
            'content.required' => 'Поле "Контент" обязательно для заполнения',
            'price.required' => 'Поле "Цена" обязательно для заполнения',
            'count.required' => 'Поле "Количество на складе" обязательно для заполнения',
            'tags.array' => 'Поле "Выберите тег" должно быть массивом',
            'colors.array' => 'Поле "Выберите цвет" должно быть массивом',
            'images.array' => 'Поле "Остальные изображения" должно быть массивом',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, $this->response(
            $validator->errors(),
            Response::HTTP_FORBIDDEN
        ));
    }

    protected function response($errors, $status)
    {
        return response()->json(['errors' => $errors], $status);
    }
}
