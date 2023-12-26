<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    public function index()
    {
        $buku = buku::paginate(10);
        // return response()->json($barang);
        return view('/buku', ['bukuList' => $buku]);

    }

    public function create()
    {
        // ,['jenis'=>$jenis,'size'=>$size]
        // $jenis= Jenis::all();
        // $size= Size::all();
        return view('/buku-add');
    }

    public function store(BukuRequest $request)
    {
        //$bahanbaku = new Barang;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->tanggal = $request->tanggal;
        //$bahanbaku->jenis = $request->jenis;
        //$bahanbaku->nama = $request->nama;
        //$bahanbaku->size = $request->size;
        //$bahanbaku->qty = $request->qty;
        //$bahanbaku->save();

        $buku = buku::create($request->all());
        if ($buku) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Tambah Data Berhasil!');
        }
        return redirect('/buku');
    }

    public function edit(Request $request, $id)
    {
        $buku = buku::findOrFail($id);
        // $jenis = Jenis::all();
        // $size = Size::all();
        return view('buku-edit', ['buku' => $buku]);
        // 'jenis'=>$jenis, 'size'=>$size
    }

    public function update($id, Request $request)
    {
        $buku = buku::findOrFail($id);
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->tanggal= $request->tanggal;
        //$bahanbaku->jenis= $request->jenis;
        //$bahanbaku->nama= $request->nama;
        //$bahanbaku->size= $request->size;
        //$bahanbaku->qty= $request->qty;
        //$bahanbaku->save();
        $buku->update($request->all());
        if ($buku) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Edit Data Berhasil!');
        }
        return redirect('/buku');
    }

    public function delete($id)
    {
        $buku = buku::findOrFail($id);
        return view('buku-delete', ['buku' => $buku]);
    }

    public function destroy($id)
    {
        //query builder $deleteBahanbaku = DB::table('bahanbakus')->where('nama',$nama)->delete();
        $deletebuku = buku::findOrFail($id);
        $deletebuku->delete();
        if ($deletebuku) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Hapus Data Berhasil!');
        }
        return redirect('/buku');
    }

}
