<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermintaanBarangRequest;
use App\Models\Barang;
use App\Models\Pbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PbarangController extends Controller
{
    public function index()
    {
        $permintaanbarang = Pbarang::with('barang')->get();
        $permintaanbarang = Pbarang::paginate(10);
        return view('permintaanbarang', ['permintaanbarangList' => $permintaanbarang]);
    }

    public function create()
    {
        $barang = Barang::all();
        // $jenis= Jenis::all();
        // $size= Size::all();
        return view('/permintaanbarang-add', ['barang' => $barang]);
    }

    public function store(PermintaanBarangRequest $request)
    {
        //$bahanbaku = new Bahanbaku;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->tanggal = $request->tanggal;
        //$bahanbaku->jenis = $request->jenis;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->size = $request->size;
        //$bahanbaku->qty = $request->qty;
        //$bahanbaku->save();
        $permintaanbarang = Pbarang::create($request->all());
        if ($permintaanbarang) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Tambah Data Berhasil!');
        }
        return redirect('/permintaanbarang');
    }

    public function edit(Request $request, $id)
    {
        $permintaanbarang = Pbarang::findOrFail($id);
        $barang = barang::all();
        // $jenis = Jenis::all();
        // $size = Size::all();
        return view('permintaanbarang-edit', ['permintaanbarang' => $permintaanbarang, 'barang' => $barang]);
    }

    public function update($id, PermintaanBarangRequest $request)
    {
        $permintaanbarang = Pbarang::findOrFail($id);
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->tanggal= $request->tanggal;
        //$bahanbaku->jenis= $request->jenis;
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->size= $request->size;
        //$bahanbaku->qty= $request->qty;
        //$bahanbaku->save();
        $permintaanbarang->update($request->all());
        if ($permintaanbarang) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Edit Data Berhasil!');
        }
        return redirect('/permintaanbarang');
    }

    public function delete($id)
    {
        $permintaanbarang = Pbarang::findOrFail($id);
        return view('permintaanbarang-delete', ['permintaanbarang' => $permintaanbarang]);
    }

    public function destroy($id)
    {
        //query builder $deleteBahanbaku = DB::table('bahanbakus')->where('nama',$nama)->delete();
        $deletePermintaanbarang = Pbarang::findOrFail($id);
        $deletePermintaanbarang->delete();
        if ($deletePermintaanbarang) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Hapus Data Berhasil!');
        }
        return redirect('/permintaanbarang');
    }

    public function laporan()
    {
        $permintaanbarang = Pbarang::with('barang')->get();
        $permintaanbarang = Pbarang::paginate(10);
        return view('laporanpermintaanbarang', ['permintaanbarangList' => $permintaanbarang]);
    }

    public function cetakPertanggal($tglawal, $tglakhir)
    {
        $permintaanbarang = Pbarang::with('barang')->get();
        $cetak = Pbarang::with('barang')->whereBetween('tglpermintaan', [$tglawal, $tglakhir])->get();
        return view('cetak-laporanpermintaanbarang-pertanggal', compact('cetak', 'tglawal', 'tglakhir'));
    }

}
