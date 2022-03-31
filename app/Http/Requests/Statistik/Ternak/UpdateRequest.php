<?php

namespace App\Http\Requests\Statistik\Ternak;

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
            'jenis_ternak' => 'required',
            'jumlah_populasi' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'jenis_ternak.required' => 'Jenis ternak wajib diisi.',
            'jumlah_populasi.required' => 'Jumlah populasi wajib diisi.',
            'jumlah_populasi.numeric' => 'Jumlah populasi berupa angka.',
        ];
    }
}
