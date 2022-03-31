<?php

namespace App\Http\Requests\Desa;

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
            'nama_desa' => 'required',
            'geojson' => 'required',
            'warna_wilayah_desa' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'deskripsi' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'nama_desa.required' => 'Nama desa wajib diisi.',
            'geojson.required' => 'Geojson wajib diisi.',
            'warna_wilayah_desa.required' => 'Warna wilayah desa wajib diisi.',
            'latitude.required' => 'Latitude wajib diisi.',
            'longitude.required' => 'Longitude wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.min' => 'Deskripsi minimal 5 karakter.'
        ];
    }
}
