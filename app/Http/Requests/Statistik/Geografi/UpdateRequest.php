<?php

namespace App\Http\Requests\Statistik\Geografi;

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
            'id_desa' => 'required',
            'tahun' => 'required|numeric',
            'luas' => 'required|numeric',
            'ketinggian' => 'required|numeric',
            'jarak_kecamatan' => 'required|numeric',
            'jarak_kabupaten' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'luas.required' => 'Luas wajib diisi.',
            'luas.numeric' => 'Luas harus berupa angka.',
            'ketinggian.required' => 'Ketinggian wajib diisi.',
            'ketinggian.numeric' => 'Ketinggian harus berupa angka.',
            'jarak_kecamatan.required' => 'Jarak kecamatan wajib diisi.',
            'jarak_kecamatan.numeric' => 'Jarak kecamatan berupa angka.',
            'jarak_kabupaten.required' => 'Jarak Kabupaten wajib diisi.',
            'jarak_kabupaten.numeric' => 'Jarak Kabupaten harus berupa angka.'
        ];
    }
}
