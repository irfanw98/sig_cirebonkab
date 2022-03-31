<?php

namespace App\Http\Requests\Statistik\Sumberairminum;

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
            'sumber_air_minum' => 'required',
            'banyak_air_minum' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'sumber_air_minum.required' => 'Sumber air minum wajib diisi.',
            'banyak_air_minum.required' => 'Banyak air minum wajib diisi.',
            'banyak_air_minum.numeric' => 'Banyak air minum berupa angka.',
        ];
    }
}
