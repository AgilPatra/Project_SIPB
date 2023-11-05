<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangMasukRequest extends FormRequest
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
            'id_produksi' => 'required|max:19',
            'tanggal_produksi' => 'required',
            'kodebarang' => 'required',
            'tglmasuk' => 'required',
            'jmlahmasuk' => 'required|integer:barangmasuks',
        ];
    }

    public function messages()
    {
        return [
            'id_produksi.required' => 'Id Produksi Harus Diisi',
            'id_produksi.max' => 'Id Produksi Maksimal :max Karakter',
            'tanggal_produksi.required' => 'Tanggal Produksi Harus Diisi',
            'kodebarang.required' => 'Kode Barang Harus Diisi',
            'tglmasuk.required' => 'Tanggal Barang Masuk Harus Diisi',
            'jmlahmasuk.required' => 'Jumlah Barang Masuk Harus Diisi',
            'jmlahmasuk.integer' => 'Jumlah Barang Masuk Harus Angka',
        ];
    }
}
