<?php

namespace App\Http\Requests\Statistik\Penduduk;

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
            'tahun' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'laju' => 'required|numeric',
            'persentase' => 'required|numeric',
            'kepadatan' => 'required|numeric',
            'rasio_jk' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'jumlah.required' => 'Jumlah penduduk wajib diisi.',
            'jumlah.numeric' => 'Jumlah penduduk harus berupa angka.',
            'laju.required' => 'Laju penduduk wajib diisi.',
            'laju.numeric' => 'Laju penduduk harus berupa angka.',
            'persentase.required' => 'Persentase penduduk wajib diisi.',
            'persentase.numeric' => 'Persentase penduduk berupa angka.',
            'kepadatan.required' => 'Kepadatan penduduk wajib diisi.',
            'kepadatan.numeric' => 'Kepadatan penduduk harus berupa angka.',
            'rasio_jk.required' => 'Rasio jenis kelamin penduduk wajib diisi.',
            'rasio_jk.numeric' => 'Rasio jenis kelamin penduduk harus berupa angka.',
        ];
    }
}
