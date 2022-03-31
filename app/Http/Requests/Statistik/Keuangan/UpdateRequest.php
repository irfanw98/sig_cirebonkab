<?php

namespace App\Http\Requests\Statistik\Keuangan;

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
            'bank_umum_pemerintah' => 'required|numeric',
            'bank_umum_swasta' => 'required|numeric',
            'bank_perkreditan_rakyat' => 'required|numeric',
            'kud' => 'required|numeric',
            'kopinkra' => 'required|numeric',
            'kospin' => 'required|numeric',
            'koperasi_lainnya' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'bank_umum_pemerintah.required' => 'Bank umum pemerintah wajib diisi.',
            'bank_umum_pemerintah.numeric' => 'Bank umum pemerintah harus berupa angka.',
            'bank_umum_swasta.required' => 'Bank umum swasta wajib diisi.',
            'bank_umum_swasta.numeric' => 'Bank umum swasta harus berupa angka.',
            'bank_perkreditan_rakyat.required' => 'Bank perkreditan rakyat wajib diisi.',
            'bank_perkreditan_rakyat.numeric' => 'Bank perkreditan rakyat berupa angka.',
            'kud.required' => 'Kud wajib diisi.',
            'kud.numeric' => 'kud harus berupa angka.',
            'kopinkra.required' => 'Kopinkra wajib diisi.',
            'kopinkra.numeric' => 'Kopinkra harus berupa angka.',
            'kospin.required' => 'Kospin wajib diisi.',
            'kospin.numeric' => 'Kospin harus berupa angka.',
            'koperasi_lainnya.required' => 'Koperasi lainnya wajib diisi.',
            'koperasi_lainnya.numeric' => 'Koperasi lainnya harus berupa angka.',
        ];
    }
}
