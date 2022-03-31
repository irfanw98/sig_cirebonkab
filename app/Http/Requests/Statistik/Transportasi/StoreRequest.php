<?php

namespace App\Http\Requests\Statistik\Transportasi;

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
            'jenis_permukaan_jalan' => 'required',
            'akses_kendaraan' => 'required',
            'jenis_transportasi' => 'required',
            'angkutan_umum' => 'required',
            'menara_telepon' => 'required|numeric',
            'operator_layanan' => 'required|numeric',
            'sinyal_telepon' => 'required',
            'kantor_pos' => 'required',
            'perusahaan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'jenis_permukaan_jalan.required' => 'Jenis permukaan jalan wajib dipilih.',
            'akses_kendaraan.required' => 'Akses kendaraan wajib dipilih.',
            'jenis_transportasi.required' => 'Jenis Transportasi wajib dipilih.',
            'angkutan_umum.required' => 'Angkutan umum wajib dipilih.',
            'menara_telepon.required' => 'Menara telepon wajib diisi.',
            'menara_telepon.numeric' => 'Menara telepon harus berupa angka.',
            'operator_layanan.required' => 'Operator layanan wajib diisi.',
            'operator_layanan.numeric' => 'Operator layanan harus berupa angka.',
            'sinyal_telepon.required' => 'Sinyal teleponn wajib dipilih.',
            'kantor_pos.required' => 'Kantor pos wajib dipilih.',
            'perusahaan.required' => 'Perusahaan wajib dipilih.',
        ];
    }
}
