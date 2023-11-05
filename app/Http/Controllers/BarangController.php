<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::paginate(10);
        // return response()->json($barang);
        return view('/barang', ['barangList' => $barang]);

    }

    public function create()
    {
        // ,['jenis'=>$jenis,'size'=>$size]
        // $jenis= Jenis::all();
        // $size= Size::all();
        return view('/barang-add');
    }

    public function store(BarangRequest $request)
    {
        //$bahanbaku = new Barang;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->tanggal = $request->tanggal;
        //$bahanbaku->jenis = $request->jenis;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->size = $request->size;
        //$bahanbaku->qty = $request->qty;
        //$bahanbaku->save();

        $barang = Barang::create($request->all());
        if ($barang) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Tambah Data Berhasil!');
        }
        return redirect('/barang');
    }

    public function edit(Request $request, $kodebarang)
    {
        $barang = Barang::findOrFail($kodebarang);
        // $jenis = Jenis::all();
        // $size = Size::all();
        return view('barang-edit', ['barang' => $barang]);
        // 'jenis'=>$jenis, 'size'=>$size
    }

    public function update($kodebarang, Request $request)
    {
        $barang = Barang::findOrFail($kodebarang);
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->tanggal= $request->tanggal;
        //$bahanbaku->jenis= $request->jenis;
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->size= $request->size;
        //$bahanbaku->qty= $request->qty;
        //$bahanbaku->save();
        $barang->update($request->all());
        if ($barang) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Edit Data Berhasil!');
        }
        return redirect('/barang');
    }

    public function delete($kodebarang)
    {
        $barang = Barang::findOrFail($kodebarang);
        return view('barang-delete', ['barang' => $barang]);
    }

    public function destroy($kodebarang)
    {
        //query builder $deleteBahanbaku = DB::table('bahanbakus')->where('nama',$nama)->delete();
        $deleteBarang = Barang::findOrFail($kodebarang);
        $deleteBarang->delete();
        if ($deleteBarang) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Hapus Data Berhasil!');
        }
        return redirect('/barang');
    }

}
