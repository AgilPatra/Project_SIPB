<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Pbarang;

class DashboardController extends Controller
{
    public function index()
    {
        $barangmasuk_count = Barangmasuk::count();
        $barangkeluar_count = Barangkeluar::count();

        $permintaanbarang_count = Pbarang::count();
            $masuk_jan = Pbarang::whereMonth('tglpermintaan', '01')->count();
            $masuk_feb = Pbarang::whereMonth('tglpermintaan', '02')->count();
            $masuk_mar = Pbarang::whereMonth('tglpermintaan', '03')->count();
            $masuk_apr = Pbarang::whereMonth('tglpermintaan', '04')->count();
            $masuk_mei = Pbarang::whereMonth('tglpermintaan', '05')->count();
            $masuk_jun = Pbarang::whereMonth('tglpermintaan', '06')->count();
            $masuk_jul = Pbarang::whereMonth('tglpermintaan', '07')->count();
            $masuk_agu = Pbarang::whereMonth('tglpermintaan', '08')->count();
            $masuk_sep = Pbarang::whereMonth('tglpermintaan', '09')->count();
            $masuk_okt = Pbarang::whereMonth('tglpermintaan', '10')->count();
            $masuk_nov = Pbarang::whereMonth('tglpermintaan', '11')->count();
            $masuk_des = Pbarang::whereMonth('tglpermintaan', '12')->count();

        return view('home', ['barangkeluar_count' => $barangkeluar_count,
            'barangmasuk_count' => $barangmasuk_count,
            'permintaanbarang_count' => $permintaanbarang_count,
            'masukjan' => $masuk_jan, 'masukfeb' => $masuk_feb, 'masukmar' => $masuk_mar, 'masukapr' => $masuk_apr,
            'masukmei' => $masuk_mei, 'masukjun' => $masuk_jun, 'masukjul' => $masuk_jul, 'masukagu' => $masuk_agu,
            'masuksep' => $masuk_sep, 'masukokt' => $masuk_okt, 'masuknov' => $masuk_nov, 'masukdes' => $masuk_des,
        ]);

    }

}
