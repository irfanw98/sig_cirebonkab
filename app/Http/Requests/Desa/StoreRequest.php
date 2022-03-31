<?php

namespace App\Http\Requests\Desa;

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
            'kode_desa' => 'required|numeric',
            'nama_desa' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'kode_kecamatan' => 'required',
            'foto' => 'nullable|mimes:jpg,png,jpeg|max:2048',
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
            'kode_desa.required' => 'Kode desa wajib diisi.',
            'kode_desa.numeric' => 'Kode desa berupa angka.',
            'nama_desa.required' => 'Nama desa wajib diisi.',
            'nama_desa.regex' => 'Nama Desa tidak boleh berupa angka atau simbol.',
            'kode_kecamatan.required' => 'Kecamatan wajib dipilih.',
            'foto.mimes' => 'File foto wajib type jpg/png/jpeg.',
            'foto.max' => 'file foto maksimal ukuran 2mb.',
            'geojson.required' => 'Geojson wajib diisi.',
            'warna_wilayah_desa.required' => 'Warna wilayah desa wajib diisi.',
            'latitude.required' => 'Latitude wajib diisi, drag&drop atau klik pada map.',
            'longitude.required' => 'Longitude wajib diisi, drag&drop atau klik pada map.', 
            'deskripsi.required' => 'Deskripsi desa wajib diisi.',
            'deskripsi.min' => 'Deskripsi desa minimal 5 karakter.'
        ];
    }
}
