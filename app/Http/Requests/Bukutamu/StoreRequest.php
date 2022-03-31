<?php

namespace App\Http\Requests\Bukutamu;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nomor_tlp' => 'required|numeric',
            'pesan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_lengkap.required' => 'Anda belum memasukkan nama lengkap.',
            'email.required' => 'Anda belum memasukkan email.',
            'email.email' => 'Yang anda masukkan bukan email.',
            'nomor_tlp.required' => 'Anda belum memasukkan nomor telepon',
            'nomor_tlp.numeric' => 'Anda memasukkan nomor telepon bukan angka.',
            'pesan.required' => 'Anda belum memasukkan pesan.',
        ];
    }
}
