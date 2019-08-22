<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;



class RegisterRequest extends FormRequest
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
            'username' => 'required|string|unique:users|min:4|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:20',
        ];
    }

    public function messages()
    {
        $messages = [
            'username.required' => 'Username không được để trống!',
            'username.string' => 'Username nhập vào không hợp lệ!',
            'username.unique' => 'Username này đã được sử dụng!',
            'username.min' => 'Username phải từ 4 đến 50 ký tự!',
            'username.max' => 'Username phải từ 4 đến 50 ký tự!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Yêu cầu nhập đúng email!',
            'email.unique' => 'Email này đã được sử dụng!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.string' => 'Mật khẩu không hợp lệ!',
            'password.min' => 'Mật khẩu phải từ 6 đến 20 ký tự!',
            'password.max' => 'Mật khẩu phải từ 6 đến 20 ký tự!',
        ];
        return $messages;
    }

    protected function failedValidation(Validator $validator)
    {

        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status_code' => 422,
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
