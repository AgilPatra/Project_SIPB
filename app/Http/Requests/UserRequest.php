<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|max:8',
                'role' => 'required',
                'nama' => 'required|max:90',
                'jabatan' => 'required',
            ];
        } elseif ($this->isMethod('put')) {
            $userId = $this->route('id');
            return [
                'password' => 'required|max:8',
                'role' => 'required',
                'nama' => 'required|max:90',
                'jabatan' => 'required',
                'email' => 'required|email|unique:users,email,' . $userId,

            ];
        }
    }

    public function messages()
    {
        return [
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.max' => 'Password Maksimal :max Karakter',
            'password.required' => 'Password harus diisi',
            'nama.max' => 'Nama Maksimal :max Karakter',
            'nama.required' => 'Nama harus diisi',
        ];
    }
}
