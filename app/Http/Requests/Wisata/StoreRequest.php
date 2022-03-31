<?php

namespace App\Http\Requests\Wisata;

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
            'id_desa' => 'required',
            'kode_kecamatan' => 'required',
            'nama_wisata' => 'required',
            'foto' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'nama_wisata.required' => 'Nama wisata wajib diisi.',
            'foto.mimes' => 'File foto wajib type jpg/png/jpeg.',
            'foto.max' => 'File foto maksimal ukuran 2mb.',
            'latitude.required' => 'Latitude wajib diisi, atau drag&drop atau klik pada map.',
            'longitude.required' => 'Longitude wajib diisi. atau drag&drop atau klik pada map.',
        ];
    }
}
