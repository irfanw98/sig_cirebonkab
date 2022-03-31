<?php

namespace App\Http\Requests\Statistik\Sosial;

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
            'sd_negeri' => 'required|numeric',
            'sd_swasta' => 'required|numeric',
            'sd_jumlah' => 'required|numeric',
            'mi_negeri' => 'required|numeric',
            'mi_swasta' => 'required|numeric',
            'mi_jumlah' => 'required|numeric',
            'smp_negeri' => 'required|numeric',
            'smp_swasta' => 'required|numeric',
            'smp_jumlah' => 'required|numeric',
            'mts_negeri' => 'required|numeric',
            'mts_swasta' => 'required|numeric',
            'mts_jumlah' => 'required|numeric',
            'sma_negeri' => 'required|numeric',
            'sma_swasta' => 'required|numeric',
            'sma_jumlah' => 'required|numeric',
            'ma_negeri' => 'required|numeric',
            'ma_swasta' => 'required|numeric',
            'ma_jumlah' => 'required|numeric',
            'smk_negeri' => 'required|numeric',
            'smk_swasta' => 'required|numeric',
            'smk_jumlah' => 'required|numeric',
            'pt_negeri' => 'required|numeric',
            'pt_swasta' => 'required|numeric',
            'pt_jumlah' => 'required|numeric',
            'sarana_sd' => 'required',
            'sarana_mi' => 'required',
            'sarana_smp' => 'required',
            'sarana_mts' => 'required',
            'sarana_sma' => 'required',
            'sarana_ma' => 'required',
            'sarana_smk' => 'required',
            'sarana_pt' => 'required',
            'sarana_rs' => 'required|numeric',
            'sarana_rs_bersalin' => 'required|numeric',
            'sarana_poliklinik' => 'required|numeric',
            'sarana_rawat_inap' => 'required|numeric',
            'sarana_tanpa_rawat_inap' => 'required|numeric',
            'sarana_apotek' => 'required|numeric',
            'kemudahan_rs' => 'required',
            'kemudahan_rs_bersalin' => 'required',
            'kemudahan_poliklinik' => 'required',
            'kemudahan_rawat_inap' => 'required',
            'kemudahan_tanpa_rawat_inap' => 'required',
            'kemudahan_apotek' => 'required',
            'gizi_buruk' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'sd_negeri.required' => 'Sd negeri wajib diisi.',
            'sd_negeri.numeric' => 'Sd negeri harus berupa angka.',
            'sd_swasta.required' => 'Sd swasta wajib diisi.',
            'sd_swasta.numeric' => 'Sd swasta harus berupa angka.',
            'sd_jumlah.required' => 'Sd jumlah wajib diisi.',
            'sd_jumlah.numeric' => 'Sd jumlah berupa angka.',
            'mi_negeri.required' => 'Mi negeri wajib diisi.',
            'mi_negeri.numeric' => 'Mi negeri harus berupa angka.',
            'mi_swasta.required' => 'Mi swasta wajib diisi.',
            'mi_swasta.numeric' => 'Mi swasta harus berupa angka.',
            'mi_jumlah.required' => 'Mi jumlah wajib diisi.',
            'mi_jumlah.numeric' => 'Mi jumlah berupa angka.',
            'smp_negeri.required' => 'Smp negeri wajib diisi.',
            'smp_negeri.numeric' => 'Smp negeri harus berupa angka.',
            'smp_swasta.required' => 'Smp swasta wajib diisi.',
            'smp_swasta.numeric' => 'Smp swasta harus berupa angka.',
            'smp_jumlah.required' => 'Smp jumlah wajib diisi.',
            'smp_jumlah.numeric' => 'Smp jumlah berupa angka.',
            'mts_negeri.required' => 'Mts negeri wajib diisi.',
            'mts_negeri.numeric' => 'Mts negeri harus berupa angka.',
            'mts_swasta.required' => 'Mts swasta wajib diisi.',
            'mts_swasta.numeric' => 'Mts swasta harus berupa angka.',
            'mts_jumlah.required' => 'Mts jumlah wajib diisi.',
            'mts_jumlah.numeric' => 'Mts jumlah berupa angka.',
            'sma_negeri.required' => 'Sma negeri wajib diisi.',
            'sma_negeri.numeric' => 'Sma negeri harus berupa angka.',
            'sma_swasta.required' => 'Sma swasta wajib diisi.',
            'sma_swasta.numeric' => 'Sma swasta harus berupa angka.',
            'sma_jumlah.required' => 'Sma jumlah wajib diisi.',
            'sma_jumlah.numeric' => 'Sma jumlah berupa angka.',
            'ma_negeri.required' => 'Ma negeri wajib diisi.',
            'ma_negeri.numeric' => 'Ma negeri harus berupa angka.',
            'ma_swasta.required' => 'Ma swasta wajib diisi.',
            'ma_swasta.numeric' => 'Ma swasta harus berupa angka.',
            'ma_jumlah.required' => 'Ma jumlah wajib diisi.',
            'ma_jumlah.numeric' => 'Ma jumlah berupa angka.',
            'smk_negeri.required' => 'Smk negeri wajib diisi.',
            'smk_negeri.numeric' => 'Smk negeri harus berupa angka.',
            'smk_swasta.required' => 'Smk swasta wajib diisi.',
            'smk_swasta.numeric' => 'Smk swasta harus berupa angka.',
            'smk_jumlah.required' => 'Smk jumlah wajib diisi.',
            'smk_jumlah.numeric' => 'Smk jumlah berupa angka.',
            'pt_negeri.required' => 'Perguruan tinggi negeri wajib diisi.',
            'pt_negeri.numeric' => 'Perguruan tinggi negeri harus berupa angka.',
            'pt_swasta.required' => 'Perguruan tinggi swasta wajib diisi.',
            'pt_swasta.numeric' => 'Perguruan tinggi swasta harus berupa angka.',
            'pt_jumlah.required' => 'Perguruan tinggi jumlah wajib diisi.',
            'pt_jumlah.numeric' => 'Perguruan tinggi jumlah berupa angka.',
            'sarana_sd.required' => 'Sarana sd wajib diisi.',
            'sarana_mi.required' => 'Sarana mi wajib diisi.',
            'sarana_smp.required' => 'Sarana smp wajib diisi.',
            'sarana_mts.required' => 'Sarana mts wajib diisi.',
            'sarana_sma.required' => 'Sarana sma wajib diisi.',
            'sarana_ma.required' => 'Sarana ma wajib diisi.',
            'sarana_smk.required' => 'Sarana smk wajib diisi.',
            'sarana_pt.required' => 'Sarana perguruan tinggi wajib diisi.',
            'sarana_rs.required' => 'Sarana rs wajib diisi.',
            'sarana_rs.numeric' => 'Sarana rs berupa angka.',
            'sarana_rs_bersalin.required' => 'Sarana rs bersalin wajib diisi.',
            'sarana_rs_bersalin.numeric' => 'Sarana rs bersalin berupa angka.',
            'sarana_poliklinik.required' => 'Sarana poliklinik wajib diisi.',
            'sarana_poliklinik.numeric' => 'Sarana poliklinik berupa angka.',
            'sarana_rawat_inap.required' => 'Sarana rawat inap wajib diisi.',
            'sarana_rawat_inap.numeric' => 'Sarana rawat inap berupa angka.',
            'sarana_tanpa_rawat_inap.required' => 'Sarana tanpa rawat inap wajib diisi.',
            'sarana_tanpa_rawat_inap.numeric' => 'Sarana tanpa rawat inap berupa angka.',
            'sarana_apotek.required' => 'Sarana apotek wajib diisi.',
            'sarana_apotek.numeric' => 'Sarana apotek berupa angka.',
            'kemudahan_rs.required' => 'Kemudahan rs wajib diisi.',
            'kemudahan_rs_bersalin.required' => 'Kemudahan rs bersalin wajib diisi.',
            'kemudahan_poliklinik.required' => 'Kemudahan poliklinik wajib diisi.',
            'kemudahan_rawat_inap.required' => 'Kemudahan rawat inap wajib diisi.',
            'kemudahan_tanpa_rawat_inap.required' => 'Kemudahan tanpa rawat inap wajib diisi.',
            'kemudahan_apotek.required' => 'Kemudahan apotek wajib diisi.',
            'gizi_buruk.required' => 'Gizi buruk wajib diisi.',
        ];
    }
}
