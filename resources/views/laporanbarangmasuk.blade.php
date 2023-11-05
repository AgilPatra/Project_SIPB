@extends('layouts.main')
@section('title','LaporanBarangMasuk')
@section('content')
<h1>Laporan Barang Masuk</h1>
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
        <a href="" onclick="this.href='/cetak-laporanbarangmasuk-pertanggal/'+document.getElementById('tglawal').value +
        '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-0 mt-2">
        <span>Cetak  <i class="fas fa-fw fa-print"></i></a>
      
    </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
    <table id="laporanbarangmasuk" class="table table-bordered">
        <thead>
            <tr class="table table-bordered; table-info">
                <th>Id Barang Masuk</th>
                <th>Id Permintaan Produksi</th>
                <th>Id Produksi</th>
                <th>Tanggal Produksi</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangmasukList as $data)
                <tr class="table table-bordered">
                    <td>{{$data->id}}</td>
                    <td>{{$data->id_pproduksi}}</td>
                    <td>{{$data->id_produksi}}</td>
                    <td>{{$data->tanggal_produksi}}</td>
                    <td>{{$data->kodebarang}}</td>
                    <td>{{$data->barang['namabarang']}}</td>
                    <td>{{$data->barang['jenis']}}</td>
                    <td>{{$data->tglmasuk}}</td>
                    <td>{{$data->jmlahmasuk}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>
</div>
</div>
        <div class="my-9">
            {{$barangmasukList->links()}}
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
        <script>
            $(document).ready(function() {
                $('#laporanbarangmasuk').DataTable();
            });
        </script>
@endsection