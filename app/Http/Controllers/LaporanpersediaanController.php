<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LaporanpersediaanController;
use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Laporanpersediaan;

class LaporanpersediaanController extends Controller
{
    public function index()
    {
        //  $bahanbaku = Bahanbaku::all();
        // return view('/bahanbaku', ['bahanbakuList' => $bahanbaku]);

        //querybuilder
        //$bahanbaku= DB::table('bahanbakus')->get();
        // dd($bahanbaku);

        //eloquent
        //  $masuk_jan = Barang::whereMonth('tanggal', '01')->count();
        //  $masuk_feb = Barang::whereMonth('tanggal', '02')->count();
        //  $masuk_mar = Barang::whereMonth('tanggal', '03')->count();
        //  $masuk_apr = Barang::whereMonth('tanggal', '04')->count();
        //  $masuk_mei = Barang::whereMonth('tanggal', '05')->count();
        //  $masuk_jun = Barang::whereMonth('tanggal', '06')->count();
        //  $masuk_jul = Barang::whereMonth('tanggal', '07')->count();
        //  $masuk_agu = Barang::whereMonth('tanggal', '08')->count();
        //  $masuk_sep = Barang::whereMonth('tanggal', '09')->count();
        //  $masuk_okt = Barang::whereMonth('tanggal', '10')->count();
        //  $masuk_nov = Barang::whereMonth('tanggal', '11')->count();
        //  $masuk_des = Barang::whereMonth('tanggal', '12')->count();
        $laporanpersediaan = Laporanpersediaan::paginate(10);
        return view('/laporanpersediaan', ['laporanpersediaanList' => $laporanpersediaan]);
        //   'masukjan' => $masuk_jan, 'masukfeb' => $masuk_feb,
        //   'masukmar' => $masuk_mar, 'masukapr' => $masuk_apr,
        //  'masukmei' => $masuk_mei,'masukjun' => $masuk_jun, 'masukjul' => $masuk_jul, 'masukagu' => $masuk_agu,
        //  'masuksep' => $masuk_sep, 'masukokt' => $masuk_okt,'masuknov' => $masuk_nov, 'masukdes' => $masuk_des,]);
    }

    // public function cetak()
    // {
    //  $laporanpersediaan = Laporanpersediaan::all();
    //   return view('/cetak-laporanpersediaan', ['bahanbakuList' => $bahanbaku]);

    //querybuilder
    //$bahanbaku= DB::table('bahanbakus')->get();
    // dd($bahanbaku);

    //eloquent
    //$bahanbaku = Bahanbaku::get();
    //return view('/laporanbahanbaku', ['bahanbakuList' => $bahanbaku]);
    // }

    public function cetakForm()
    {

        return view('/cetak-laporanpersediaan-form', ['cetaklaporanpersediaankform']);

    }

    public function cetakPertanggal($tglawal, $tglakhir)
    {
        $cetak = Laporanpersediaan::whereBetween('tglmasuk', [$tglawal, $tglakhir])->get();
        $cetak = Laporanpersediaan::whereBetween('tglkeluar', [$tglawal, $tglakhir])->get();

        return view('cetak-laporanpersediaan-pertanggal', compact('cetak'));
    }

    public function laporanbm()
    {
        $barangmasuk = Barangmasuk::with('barang')->get();
        $barangmasuk = Barangmasuk::paginate(10);
        return view('laporanbarangmasuk', ['barangmasukList' => $barangmasuk]);
    }

    public function cetakPertanggalbmk($tglawal, $tglakhir)
    {
        $barangmasuk = Barangmasuk::with('barang')->get();
        $cetak = Barangmasuk::with('barang')->whereBetween('tglmasuk', [$tglawal, $tglakhir])->get();
        return view('cetak-laporanbarangmasuk-pertanggal', compact('cetak', 'tglawal', 'tglakhir'));
    }

    public function laporanbk()
    {
        $barangkeluar = Barangkeluar::with('barang')->get();
        $barangkeluar = Barangkeluar::paginate(10);
        return view('laporanbarangkeluar', ['barangkeluarList' => $barangkeluar]);
    }

    public function cetakPertanggalbk($tglawal, $tglakhir)
    {
        $barangkeluar = Barangkeluar::with('barang')->get();
        $cetak = Barangkeluar::with('barang')->whereBetween('tglkeluar', [$tglawal, $tglakhir])->get();
        return view('cetak-laporanbarangkeluar-pertanggal', compact('cetak', 'tglawal', 'tglakhir'));
    }

    public function laporanb()
    {

        $barang = Barang::paginate(10);
        return view('laporanbarang', ['barangList' => $barang]);
    }

    public function cetakb()
    {

        $cetak = Barang::get();
        return view('cetak-laporanbarang', compact('cetak'));
    }

}
