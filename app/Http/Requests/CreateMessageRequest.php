<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|string|min:3|max:32767',
        ];
    }

    /**
     * Get error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'body.required' => 'Сообщение не может быть пустым',
            'body.min'      => 'Поле должно содержать не менее 3 символов',
            'name.max'      => 'Поле должно содержать не более 32767 символов',
        ];
    }
}
