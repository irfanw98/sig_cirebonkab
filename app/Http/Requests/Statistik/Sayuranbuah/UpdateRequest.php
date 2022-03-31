<?php

namespace App\Http\Requests\Statistik\Sayuranbuah;

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
            'jenis_tanaman' => 'required',
            'luas_tanam' => 'required|numeric',
            'luas_panen' => 'required|numeric',
            'produksi' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'jenis_tanaman.required' => 'Jenis tanaman wajib diisi.',
            'luas_tanam.required' => 'Luas tanam wajib diisi.',
            'luas_tanam.numeric' => 'Luas tanam berupa angka.',
            'luas_panen.required' => 'Luas panen wajib diisi.',
            'luas_panen.numeric' => 'Luas panen berupa angka.',
            'produksi.required' => 'Produksi wajib diisi.',
            'produksi.numeric' => 'Produksi berupa angka.',
        ];
    }
}
