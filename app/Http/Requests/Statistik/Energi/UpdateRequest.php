<?php

namespace App\Http\Requests\Statistik\Energi;

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
            'pln' => 'required|numeric',
            'non_pln' => 'required|numeric',
            'pln_jumlah' => 'required|numeric',
            'non_listrik' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'pln.required' => 'Pln wajib diisi.',
            'pln.numeric' => 'Pln harus berupa angka.',
            'non_pln.required' => 'Non pln wajib diisi.',
            'non_pln.numeric' => 'Non pln harus berupa angka.',
            'pln_jumlah.required' => 'Pln jumlah wajib diisi.',
            'pln_jumlah.numeric' => 'Pln jumlah berupa angka.',
            'non_listrik.required' => 'Non listrik wajib diisi.',
            'non_listrik.numeric' => 'Non listrik harus berupa angka.',
        ];
    }
}
