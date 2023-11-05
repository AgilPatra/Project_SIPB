<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangKeluarRequest;
use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Pbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangkeluarController extends Controller
{
    public function index()
    {
        $masuk_jan = Barangkeluar::whereMonth('tglkeluar', '01')->count();
        $masuk_feb = Barangkeluar::whereMonth('tglkeluar', '02')->count();
        $masuk_mar = Barangkeluar::whereMonth('tglkeluar', '03')->count();
        $masuk_apr = Barangkeluar::whereMonth('tglkeluar', '04')->count();
        $masuk_mei = Barangkeluar::whereMonth('tglkeluar', '05')->count();
        $masuk_jun = Barangkeluar::whereMonth('tglkeluar', '06')->count();
        $masuk_jul = Barangkeluar::whereMonth('tglkeluar', '07')->count();
        $masuk_agu = Barangkeluar::whereMonth('tglkeluar', '08')->count();
        $masuk_sep = Barangkeluar::whereMonth('tglkeluar', '09')->count();
        $masuk_okt = Barangkeluar::whereMonth('tglkeluar', '10')->count();
        $masuk_nov = Barangkeluar::whereMonth('tglkeluar', '11')->count();
        $masuk_des = Barangkeluar::whereMonth('tglkeluar', '12')->count();
        $barangkeluar = Barangkeluar::with('pbarang')->get();
        $barangkeluar = Barangkeluar::with('barang')->get();
        $barangkeluar = Barangkeluar::paginate(10);

        return view('barangkeluar', ['barangkeluarList' => $barangkeluar,
            'masukjan' => $masuk_jan, 'masukfeb' => $masuk_feb, 'masukmar' => $masuk_mar, 'masukapr' => $masuk_apr,
            'masukmei' => $masuk_mei, 'masukjun' => $masuk_jun, 'masukjul' => $masuk_jul, 'masukagu' => $masuk_agu,
            'masuksep' => $masuk_sep, 'masukokt' => $masuk_okt, 'masuknov' => $masuk_nov, 'masukdes' => $masuk_des]);
    }

    public function create()
    {
        $barang = Barang::all();
        $pbarang = Pbarang::all();
        // $jenis= Jenis::all();
        // $size= Size::all();
        return view('/barangkeluar-add', ['barang' => $barang, 'pbarang' => $pbarang]);
    }

    public function store(BarangKeluarRequest $request)
    {
        //$bahanbaku = new Bahanbaku;
        //$bahanbaku->kode_bahanbaku = $request->kode_bahanbaku;
        //$bahanbaku->tanggal = $request->tanggal;
        //$bahanbaku->jenis = $request->jenis;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->size = $request->size;
        //$bahanbaku->qty = $request->qty;
        //$bahanbaku->save();
        $barangkeluar = Barangkeluar::create($request->all());
        if ($barangkeluar) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Tambah Data Berhasil!');
        }
        return redirect('/barangkeluar');
    }

    public function edit(Request $request, $id)
    {
        $barangkeluar = Barangkeluar::findOrFail($id);
        $barang = Barang::all();
        $pbarang = Pbarang::all();
        // $jenis = Jenis::all();
        // $size = Size::all();
        return view('barangkeluar-edit', ['barangkeluar' => $barangkeluar,
            'barang' => $barang, 'pbarang' => $pbarang]);
    }

    public function update($id, BarangKeluarRequest $request)
    {
        $barangkeluar = Barangkeluar::findOrFail($id);
        //$bahanbaku->kode_bahanbaku= $request->kode_bahanbaku;
        //$bahanbaku->tanggal= $request->tanggal;
        //$bahanbaku->jenis= $request->jenis;
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->size= $request->size;
        //$bahanbaku->qty= $request->qty;
        //$bahanbaku->save();
        $barangkeluar->update($request->all());
        if ($barangkeluar) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Edit Data Berhasil!');
        }
        return redirect('/barangkeluar');
    }

    public function delete($id)
    {
        $barangkeluar = Barangkeluar::findOrFail($id);
        return view('barangkeluar-delete', ['barangkeluar' => $barangkeluar]);
    }

    public function destroy($id)
    {
        //query builder $deleteBahanbaku = DB::table('bahanbakus')->where('kode_bahanbaku',$kode_bahanbaku)->delete();
        $deleteBarangkeluar = Barangkeluar::findOrFail($id);
        $deleteBarangkeluar->delete();
        if ($deleteBarangkeluar) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Hapus Data Berhasil!');
        }
        return redirect('/barangkeluar');
    }
}
