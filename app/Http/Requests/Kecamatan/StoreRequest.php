<?php

namespace App\Http\Requests\Kecamatan;

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
            'kode_kecamatan' => 'required|numeric|unique:tb_kecamatan',
            'nama_kecamatan' => 'required',
            'warna_wilayah_kecamatan' => 'required',
            'geojson' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Kode kecamatan wajib diisi.',
            'kode_kecamatan.numeric' => 'Kode kecamatan berupa angka.',
            'kode_kecamatan.unique' => 'Kode kecamatan sudah dipakai.',
            'nama_kecamatan.required' => 'Nama Kecamatan wajib diisi.',
            'warna_wilayah_kecamatan.required' => 'Warna wilayah wajib diisi.',
            'geojson.required' => 'Geojson wajib diisi.'
        ];
    }
}
