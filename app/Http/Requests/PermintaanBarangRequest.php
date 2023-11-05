<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermintaanBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'kodebarang' => 'required',
                'tglpermintaan' => 'required',
                'jmlpermintaan' => 'required|integer:pbarangs',
            ];
        } elseif ($this->isMethod('put')) {

            return [

                'kgudang' => 'required',

            ];
        }
    }
    public function messages()
    {
        return [
            'kodebarang.required' => 'Kode Barang Harus Diisi',
            'tglpermintaan.required' => 'Tanggal Permintaan Barang Harus Diisi',
            'jmlpermintaan.integer' => 'Jumlah Permintaan Barang Harus Berisi Angka',
            'jmlpermintaan.required' => 'Jumlah Permintaan Barang Harus Diisi',
            'kgudang.required' => 'Konfirmasi Gudang Harus Dipilih',
        ];
    }
}
