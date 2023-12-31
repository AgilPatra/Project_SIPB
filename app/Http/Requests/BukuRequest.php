<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
            'judul' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'id_kategori' => 'required',
            'tahun_terbit' => 'required|integer',
            'isbn' => 'required|unique:buku,isbn',
            'jumlah_tersedia' => 'required|integer',
        ];

    }

    public function messages()
    {
        return [
            // 'namabarang.required' => 'Nama Barang Harus Diisi',
            // 'namabarang.unique' => 'Nama Barang Sudah Ada',
            // 'stok.numeric' => 'Stok Harus Berisi Angka',
            // 'stok.required' => 'Stok Harus Diisi',
        ];
    }
}
