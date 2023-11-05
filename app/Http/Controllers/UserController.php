<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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
        $user = User::paginate(10);
        return view('/user', ['userList' => $user]);
        //   'masukjan' => $masuk_jan, 'masukfeb' => $masuk_feb,
        //   'masukmar' => $masuk_mar, 'masukapr' => $masuk_apr,
        //  'masukmei' => $masuk_mei,'masukjun' => $masuk_jun, 'masukjul' => $masuk_jul, 'masukagu' => $masuk_agu,
        //  'masuksep' => $masuk_sep, 'masukokt' => $masuk_okt,'masuknov' => $masuk_nov, 'masukdes' => $masuk_des,]);
    }

    public function create()
    {
        // ,['jenis'=>$jenis,'size'=>$size]
        // $jenis= Jenis::all();
        // $size= Size::all();
        return view('/user-add');
    }

    public function store(StoreUserRequest $request)
    {
        //$bahanbaku = new Barang;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->tanggal = $request->tanggal;
        //$bahanbaku->jenis = $request->jenis;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->size = $request->size;
        //$bahanbaku->qty = $request->qty;
        //$bahanbaku->save();
        $user = User::create($request->all());
        if ($user) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Tambah Data Berhasil!');
        }
        return redirect('/user');
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // $jenis = Jenis::all();
        // $size = Size::all();
        return view('user-edit', ['user' => $user]);
        // 'jenis'=>$jenis, 'size'=>$size
    }

    public function update($id, StoreUserRequest $request)
    {
        $user = User::findOrFail($id);
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->tanggal= $request->tanggal;
        //$bahanbaku->jenis= $request->jenis;
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->size= $request->size;
        //$bahanbaku->qty= $request->qty;
        //$bahanbaku->save();
        $user->update($request->all());
        if ($user) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Edit Data Berhasil!');
        }
        return redirect('/user');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        return view('user-delete', ['user' => $user]);
    }

    public function destroy($id)
    {
        //query builder $deleteBahanbaku = DB::table('bahanbakus')->where('nama',$nama)->delete();
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();
        if ($deleteUser) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Hapus Data Berhasil!');
        }
        return redirect('/user');
    }
}
