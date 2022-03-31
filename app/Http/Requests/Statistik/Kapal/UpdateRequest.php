<?php

namespace App\Http\Requests\Statistik\Kapal;

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
            'kategori_kapal' => 'required',
            'jumlah_kapal' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'kategori_kapal.required' => 'Kategori kapal wajib diisi.',
            'jumlah_kapal.required' => 'Jumlah kapal wajib diisi.',
            'jumlah_kapal.numeric' => 'Jumlah kapal berupa angka.',
        ];
    }
}
