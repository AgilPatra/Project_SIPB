<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangKeluarRequest extends FormRequest
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
        return [
            'id_pbarang' => 'required',
            'kodebarang' => 'required',
            'tglkeluar' => 'required',
            'jmlahkeluar' => 'required|integer:barangkeluars',
        ];
    }

    public function messages()
    {
        return [
            'id_pbarang.required' => 'Id Permintaan Barang Harus Diisi',
            'kodebarang.required' => 'Kode Barang Harus Diisi',
            'tglkeluar.required' => 'Tanggal Barang Keluar Harus Diisi',
            'jmlahkeluar.required' => 'Jumlah Barang Keluar Harus Diisi',
            'jmlahkeluar.integer' => 'Jumlah Barang Keluar Harus Angka',
        ];
    }
}
