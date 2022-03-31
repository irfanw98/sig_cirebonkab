<?php

namespace App\Http\Requests\Kecamatan;

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
            'nama_kecamatan' => 'required',
            'warna_wilayah_kecamatan' => 'required',
            'geojson' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_kecamatan.required' => 'Nama Kecamatan wajib diisi.',
            'warna_wilayah_kecamatan.required' => 'Warna wilayah wajib diisi.',
            'geojson.required' => 'Geojson wajib diisi.'
        ];
    }
}
