<?php

namespace App\Http\Requests\Statistik\Budidayaperikanan;

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
            'jenis_budidaya' => 'required',
            'jumlah_budidaya' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'jenis_budidaya.required' => 'Jenis budidaya wajib diisi.',
            'jumlah_budidaya.required' => 'Jumlah budidaya wajib diisi.',
            'jumlah_budidaya.numeric' => 'Jumlah budidaya berupa angka.',
        ];
    }
}
