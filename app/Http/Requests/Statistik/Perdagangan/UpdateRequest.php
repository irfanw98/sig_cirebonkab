<?php

namespace App\Http\Requests\Statistik\Perdagangan;

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
            'kelompok_pertokoan' => 'required|numeric',
            'pasar_bangunan_permanen' => 'required|numeric',
            'pasar_bangunan_semipermanen' => 'required|numeric',
            'pasar_tanpa_bangunan' => 'required|numeric',
            'minimarket' => 'required|numeric',
            'toko' => 'required|numeric',
            'restoran' => 'required|numeric',
            'warung' => 'required|numeric',
            'hotel' => 'required|numeric',
            'motel' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'kelompok_pertokoan.required' => 'Kelompok pertokoan wajib diisi.',
            'kelompok_pertokoan.numeric' => 'Kelompok pertokoan harus berupa angka.',
            'pasar_bangunan_permanen.required' => 'Pasar bangunan permanen wajib diisi.',
            'pasar_bangunan_permanen.numeric' => 'Pasar bangunan permanen harus berupa angka.',
            'pasar_bangunan_semipermanen.required' => 'Pasar bangunan semipermanen wajib diisi.',
            'pasar_bangunan_semipermanen.numeric' => 'Pasar bangunan semipermanen berupa angka.',
            'pasar_tanpa_bangunan.required' => 'Pasar tanpa bangunan wajib diisi.',
            'pasar_tanpa_bangunan.numeric' => 'Pasar tanpa bangunan harus berupa angka.',
            'minimarket.required' => 'Minimarket wajib diisi.',
            'minimarket.numeric' => 'Minimarket harus berupa angka.',
            'toko.required' => 'Toko wajib diisi.',
            'toko.numeric' => 'Toko harus berupa angka.',
            'restoran.required' => 'Restoran wajib diisi.',
            'restoran.numeric' => 'Restoran harus berupa angka.',
            'warung.required' => 'Warung wajib diisi.',
            'warung.numeric' => 'Warung harus berupa angka.',
            'hotel.required' => 'Hotel wajib diisi.',
            'hotel.numeric' => 'Hotel harus berupa angka.',
            'motel.required' => 'Motel wajib diisi.',
            'motel.numeric' => 'Motel harus berupa angka.',
        ];
    }
}
