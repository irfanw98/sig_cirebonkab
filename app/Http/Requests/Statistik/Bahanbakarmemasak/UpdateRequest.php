<?php

namespace App\Http\Requests\Statistik\Bahanbakarmemasak;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'kode_kecamatan' => 'required',
            'tahun' => 'required|numeric',
            'jenis_bahan_bakar' => 'required',
            'banyak_bahan_bakar' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'jenis_bahan_bakar.required' => 'Jenis bahan bakar memasak wajib diisi.',
            'banyak_bahan_bakar.required' => 'Banyak bahan bakar memasak wajib diisi.',
            'banyak_bahan_bakar.numeric' => 'Banyak bahan bakar memasak berupa angka.',
        ];
    }
}
