<?php

namespace App\Http\Controllers;

// use App\Models\Size;
// use App\Models\Jenis;
// use App\Models\Supplier;
use App\Http\Requests\BarangMasukRequest;
use App\Models\Barang;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangmasukController extends Controller
{
    public function index()
    {
        $masuk_jan = Barangmasuk::whereMonth('tglmasuk', '01')->count();
        $masuk_feb = Barangmasuk::whereMonth('tglmasuk', '02')->count();
        $masuk_mar = Barangmasuk::whereMonth('tglmasuk', '03')->count();
        $masuk_apr = Barangmasuk::whereMonth('tglmasuk', '04')->count();
        $masuk_mei = Barangmasuk::whereMonth('tglmasuk', '05')->count();
        $masuk_jun = Barangmasuk::whereMonth('tglmasuk', '06')->count();
        $masuk_jul = Barangmasuk::whereMonth('tglmasuk', '07')->count();
        $masuk_agu = Barangmasuk::whereMonth('tglmasuk', '08')->count();
        $masuk_sep = Barangmasuk::whereMonth('tglmasuk', '09')->count();
        $masuk_okt = Barangmasuk::whereMonth('tglmasuk', '10')->count();
        $masuk_nov = Barangmasuk::whereMonth('tglmasuk', '11')->count();
        $masuk_des = Barangmasuk::whereMonth('tglmasuk', '12')->count();
        // $barangmasuk = Barangmasuk::with('pproduksi')->get();
        $barangmasuk = Barangmasuk::with('barang')->get();
        $barangmasuk = Barangmasuk::paginate(10);

        return view('barangmasuk', ['barangmasukList' => $barangmasuk,
            'masukjan' => $masuk_jan, 'masukfeb' => $masuk_feb, 'masukmar' => $masuk_mar, 'masukapr' => $masuk_apr,
            'masukmei' => $masuk_mei, 'masukjun' => $masuk_jun, 'masukjul' => $masuk_jul, 'masukagu' => $masuk_agu,
            'masuksep' => $masuk_sep, 'masukokt' => $masuk_okt, 'masuknov' => $masuk_nov, 'masukdes' => $masuk_des]);
    }

    public function create()
    {
        // $barangmasuk = Barangmasuk::with('pproduksi')->get();
        $barangmasuk = Barangmasuk::paginate(10);
        $barang = Barang::all();
        // $pproduksi= Pproduksi::all();
        // $supplier = Supplier::all();
        // $jenis= Jenis::all();
        // $size= Size::all();
        return view('/barangmasuk-add', ['barangmasukList' => $barangmasuk,
            'barang' => $barang]);
        // 'pproduksi'=>$pproduksi
    }

    public function store(BarangMasukRequest $request)
    {
        //$bahanbaku = new Bahanbaku;
        //$bahanbaku->kode_bahanbaku = $request->kode_bahanbaku;
        //$bahanbaku->tanggal = $request->tanggal;
        //$bahanbaku->jenis = $request->jenis;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->size = $request->size;
        //$bahanbaku->qty = $request->qty;
        //$bahanbaku->save();
        $barangmasuk = Barangmasuk::create($request->all());
        if ($barangmasuk) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Tambah Data Berhasil!');
        }
        return redirect('/barangmasuk');
    }

    public function edit(Request $request, $id)
    {
        $barangmasuk = Barangmasuk::findOrFail($id);
        $barang = Barang::all();
        // $pproduksi= Pproduksi::all();
        // $supplier = Supplier::all();
        // $jenis = Jenis::all();
        // $size = Size::all();
        return view('barangmasuk-edit', ['barangmasuk' => $barangmasuk, 'barang' => $barang]);
        // 'pproduksi'=>$pproduksi
    }

    public function update($id, BarangMasukRequest $request)
    {
        $barangmasuk = Barangmasuk::findOrFail($id);
        //$bahanbaku->kode_bahanbaku= $request->kode_bahanbaku;
        //$bahanbaku->tanggal= $request->tanggal;
        //$bahanbaku->jenis= $request->jenis;
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->size= $request->size;
        //$bahanbaku->qty= $request->qty;
        //$bahanbaku->save();
        $barangmasuk->update($request->all());
        if ($barangmasuk) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Edit Data Berhasil!');
        }
        return redirect('/barangmasuk');
    }

    public function delete($id)
    {
        $barangmasuk = Barangmasuk::findOrFail($id);
        return view('barangmasuk-delete', ['barangmasuk' => $barangmasuk]);
    }

    public function destroy($id)
    {
        //query builder $deleteBahanbaku = DB::table('bahanbakus')->where('kode_bahanbaku',$kode_bahanbaku)->delete();
        $deleteBarangmasuk = Barangmasuk::findOrFail($id);
        $deleteBarangmasuk->delete();
        if ($deleteBarangmasuk) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Hapus Data Berhasil!');
        }
        return redirect('/barangmasuk');
    }
}
