<?php

namespace App\Http\Requests\Statistik\Pendidikan;

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
            'nama_sekolah' => 'required',
            'jenjang' => 'required',
            'jumlah_murid' => 'required|numeric',
            'jumlah_guru' => 'required|numeric',
            'rasio_murid_guru' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_kecamatan.required' => 'Pilihan kecamatan wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'jenjang.required' => 'jenjang wajib diisi.',
            'jumlah_murid.required' => 'Jumlah murid wajib diisi.',
            'jumlah_murid.numeric' => 'Jumlah murid berupa angka.',
            'jumlah_guru.required' => 'Jumlah guru wajib diisi.',
            'jumlah_guru.numeric' => 'Jumlah guru harus berupa angka.',
            'rasio_murid_guru.required' => 'Rasio murid guru wajib diisi.',
            'rasio_murid_guru.numeric' => 'Rasio murid guru harus berupa angka.',
        ];
    }
}
