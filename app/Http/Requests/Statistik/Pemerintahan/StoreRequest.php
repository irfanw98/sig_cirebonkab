<?php

namespace App\Http\Requests\Statistik\Pemerintahan;

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
            'kantor_desa' => 'required|numeric',
            'kepala_desa' => 'required|numeric',
            'sekretaris_desa' => 'required|numeric',
            'kepala_urusan' => 'required|numeric',
            'kepala_dusun' => 'required|numeric',
            'hansip' => 'required|numeric',
            'pos_kamling' => 'required|numeric',
            'dusun' => 'required|numeric',
            'rukun_warga' => 'required|numeric',
            'rukun_tetangga' => 'required|numeric',
            'ketua_bpd' => 'required|numeric',
            'wakil_bpd' => 'required|numeric',
            'sekretaris_bpd' => 'required|numeric',
            'bendahara_bpd' => 'required|numeric',
            'anggota_bpd' => 'required|numeric',
            'ketua_lpmd' => 'required|numeric',
            'wakil_lpmd' => 'required|numeric',
            'sekretaris_lpmd' => 'required|numeric',
            'bendahara_lpmd' => 'required|numeric',
            'anggota_lpmd' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id_desa.required' => 'Pilihan desa wajib dipilih.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'kantor_desa.required' => 'Kantor desa wajib diisi.',
            'kantor_desa.numeric' => 'Kantor desa harus berupa angka.',
            'kepala_desa.required' => 'Kepala desa wajib diisi.',
            'kepala_desa.numeric' => 'Kepala desa harus berupa angka.',
            'sekretaris_desa.required' => 'Sekretaris desa wajib diisi.',
            'sekretaris_desa.numeric' => 'Sekretaris desa harus berupa angka.',
            'kepala_urusan.required' => 'Kepala urusan wajib diisi.',
            'kepala_urusan.numeric' => 'Kepala urusan harus berupa angka.',
            'kepala_dusun.required' => 'Kepala dusun wajib diisi.',
            'kepala_dusun.numeric' => 'Kepala dusun harus berupa angka.',
            'hansip.required' => 'Hansip wajib diisi.',
            'hansip.numeric' => 'Hansip harus berupa angka.',
            'pos_kamling.required' => 'Pos Kamling wajib diisi.',
            'pos_kamling.numeric' => 'Pos Kamling harus berupa angka.',
            'dusun.required' => 'Dusun wajib diisi.',
            'dusun.numeric' => 'Dusun harus berupa angka.',
            'rukun_warga.required' => 'Rukun warga wajib diisi.',
            'rukun_warga.numeric' => 'Rukun warga harus berupa angka.',
            'rukun_tetangga.required' => 'Rukun tetangga wajib diisi.',
            'rukun_tetangga.numeric' => 'Rukun tetangga harus berupa angka.',
            'ketua_bpd.required' => 'Ketua bpd wajib diisi.',
            'ketua_bpd.numeric' => 'Ketua bpd harus berupa angka.',
            'wakil_bpd.required' => 'Wakil bpd wajib diisi.',
            'wakil_bpd.numeric' => 'Wakil bpd harus berupa angka.',
            'sekretaris_bpd.required' => 'Sekretaris bpd wajib diisi.',
            'sekretaris_bpd.numeric' => 'Sekretaris bpd harus berupa angka.',
            'bendahara_bpd.required' => 'Bendahara bpd wajib diisi.',
            'bendahara_bpd.numeric' => 'Bendahara bpd harus berupa angka.',
            'anggota_bpd.required' => 'Anggota bpd wajib diisi.',
            'anggota_bpd.numeric' => 'Anggota bpd harus berupa angka.',
            'ketua_lpmd.required' => 'Ketua lpmd wajib diisi.',
            'ketua_lpmd.numeric' => 'Ketua lpmd harus berupa angka.',
            'wakil_lpmd.required' => 'Wakil lpmd wajib diisi.',
            'wakil_lpmd.numeric' => 'Wakil lpmd harus berupa angka.',
            'sekretaris_lpmd.required' => 'Sekretaris lpmd wajib diisi.',
            'sekretaris_lpmd.numeric' => 'Sekretaris lpmd harus berupa angka.',
            'bendahara_lpmd.required' => 'Bendahara lpmd wajib diisi.',
            'bendahara_lpmd.numeric' => 'Bendahara lpmd harus berupa angka.',
            'anggota_lpmd.required' => 'Anggota lpmd wajib diisi.',
            'anggota_lpmd.numeric' => 'Anggota lpmd harus berupa angka.',
        ];
    }
}
