<?php

namespace App\Http\Requests\Statistik\Nelayan;

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
            'jenis_nelayan' => 'required',
            'jumlah_nelayan' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'jenis_nelayan.required' => 'Jenis nelayan wajib diisi.',
            'jumlah_nelayan.required' => 'Jumlah nelayan wajib diisi.',
            'jumlah_nelayan.numeric' => 'Jumlah nelayan berupa angka.',
        ];
    }
}
