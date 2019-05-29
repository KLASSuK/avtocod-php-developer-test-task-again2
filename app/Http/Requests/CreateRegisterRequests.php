<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterRequests extends FormRequest
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
            'name'     => 'required|string|min:3|max:255|regex:/^[a-z0-9]+$/i',
            'email'    => 'required|string|min:7|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/',
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
            'name.required'      => 'Поле обязательно для заполнения',
            'name.min'           => 'Поле должно содержать не менее 3 символов',
            'name.max'           => 'Поле должно содержать не более 255 символов',
            'name.regex'         => 'Поле может содержать альфа-символы и цифры',
            'email.required'     => 'Поле обязательно для заполнения',
            'email.min'          => 'Поле должно содержать не менее 3 символов',
            'email.max'          => 'Поле должно содержать не более 255 символов',
            'email.email'        => 'Значение поля недопустимо',
            'email.unique'       => 'Данный E-mail уже используется',
            'password.required'  => 'Поле обязательно для заполнения',
            'password.min'       => 'Поле должно содержать не менее 6 символов',
            'password.confirmed' => 'Пароли не совпадают',
            'password.regex'     => 'Поле должно содержать символы в верхнем и нижнем регистре + цифры',
        ];
    }
}
