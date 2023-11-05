@extends('layouts.main')
@section('title','LaporanPersediaanBarang')
@section('content')
<h1>Laporan Persediaan Barang</h1>
<hr>
<div class="card card-info card-outline mb-3">
    <div class="card-header">
        <h3 class="text-white">Cetak</h3>
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
                <label for="label">Tanggal Awal</label>
                <input type="datetime-local" name="tglawal" id="tglawal" class="form-control ml-3" >
        </div>
        <div class="input-group mb-3">
            <label for="label">Tanggal Akhir</label>
            <input type="datetime-local" name="tglakhir" id="tglakhir" class="form-control ml-2">
    </div>
    <div class="input-group mb-0">
        <a href="" onclick="this.href='/cetak-laporanpersediaan-pertanggal/'+document.getElementById('tglawal').value +
        '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-0 mt-2">
        <span>Cetak  <i class="fas fa-fw fa-print"></i></a>
      
    </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="table table-bordered; table-info">
                    <th>Kode Bahan Baku</th>
                    <th>Nama</th>
                    <th>tglmasuk</th>
                    <th>jmlmasuk</th>
                    <th>tglkeluar</th>
                    <th>jmlkeluar</th>
                    <th>stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporanpersediaanList as $data)
                <tr class="table table-bordered">
                        <td>{{$data->kodebarang}}</td>
                        <td>{{$data->namabarang}}</td>
                        <td>{{$data->tglmasuk}}</td>
                        <td>{{$data->jmlahmasuk}}</td>
                        <td>{{$data->tglkeluar}}</td>
                        <td>{{$data->jmlahkeluar}}</td>
                        <td>{{$data->stok}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-9">
            {{$laporanpersediaanList->links()}}
        </div>
@endsection