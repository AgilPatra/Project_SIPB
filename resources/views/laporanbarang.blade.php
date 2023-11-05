@extends('layouts.main')
@section('title','LaporanBarang')
@section('content')
<h1>Laporan Barang</h1>
<hr>

   
    <div class="input-group mb-3">
        <a href="" onclick="this.href='/cetak-laporanbarang/'" target="_blank" class="btn btn-primary col-md-0 mt-2">
        <span>Cetak  <i class="fas fa-fw fa-print"></i></a>
      
    </div>
    <div></div>

    <div class="card shadow mb-4">
        <div class="card-body">
    <table id="laporanbarang" class="table table-bordered">
        <thead>
            <tr class="table table-bordered; table-info">
       
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangList as $data)
                <tr class="table table-bordered">
    
                    <td>{{$data->kodebarang}}</td>
                    <td>{{$data->namabarang}}</td>
                    <td>{{$data->stok}}</td>
                    <td>{{$data->jenis}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
        <div class="my-9">
            {{$barangList->links()}}
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
        <script>
            $(document).ready(function() {
                $('#laporanbarang').DataTable();
            });
        </script>
@endsection