<?php

namespace App\Http\Requests\Statistik\Peneranganjalan;

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
            'kode_kecamatan' => 'required',
            'tahun' => 'required|numeric',
            'sumber_penerangan_jalan' => 'required',
            'banyak_penerangan_jalan' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'sumber_penerangan_jalan.required' => 'Sumber penerangan jalan wajib diisi.',
            'banyak_penerangan_jalan.required' => 'Banyak penerangan jalan wajib diisi.',
            'banyak_penerangan_jalan.numeric' => 'Banyak penerangan jalan berupa angka.',
        ];
    }
}
