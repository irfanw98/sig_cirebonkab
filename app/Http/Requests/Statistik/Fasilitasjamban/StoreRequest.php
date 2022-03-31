<?php

namespace App\Http\Requests\Statistik\Fasilitasjamban;

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
            'nama_jamban' => 'required',
            'banyak_jamban' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'nama_jamban.required' => 'Nama jamban wajib diisi.',
            'banyak_jamban.required' => 'Banyak jamban wajib diisi.',
            'banyak_jamban.numeric' => 'Banyak jamban berupa angka.',
        ];
    }
}
