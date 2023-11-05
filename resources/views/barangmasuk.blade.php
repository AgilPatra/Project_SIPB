@extends('layouts.main')
@section('title','BahanBakuMasuk')
@section('content')

<div class="mb-4">
    <h1>Data Barang Masuk</h1>
    <hr>
    </div>
 
<div class="my-2 mb-4"><a href="barangmasuk-add" class="btn btn-primary"><span>Tambah </span>
    <i class="fas fa-regular fa-plus"></i></a></div>
    @if (Session::has('status'))
<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
@endif
{{-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-white"></i>
            <span> Barang Masuk</span></h6>
    </div> --}}
    {{-- <div class="card-body">
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <!-- Line Chart -->
        <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          
            <div class="card-body">
                <div >
                    <canvas id="myLineChart"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div> --}}
<div class="card shadow mb-4">
    <div class="card-body">
          <table id="barangmasuk" class="table table-bordered">
                <thead>
                  <tr class="table table-bordered; table-info">
                    <th>Id Masuk</th>
                    {{-- <th>Id Permintaan Produksi</th> --}}
                    <th>Id Produksi</th>
                    <th>Tanggal Produksi</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Masuk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangmasukList as $data)
                <tr class="table table-bordered">
                        <td>{{$data->id}}</td>
                        {{-- <td>{{$data->id_pproduksi}}</td> --}}
                        <td>{{$data->id_produksi}}</td>
                        <td>{{$data->tanggal_produksi}}</td>
                        <td>{{$data->kodebarang}}</td>
                        <td>{{$data->barang['namabarang']}}</td>
                        <td>{{$data->tglmasuk}}</td>
                        <td>{{$data->jmlahmasuk}}</td>
                       
                        <td>
                            <a href="barangmasuk-edit/{{$data->id}}" class="btn btn-primary">
                                <span>Edit </span><i class="fas fa-regular fa-pen"></i></a>
                            <a href="barangmasuk-delete/{{$data->id}}" class="btn btn-secondary">
                                <span>Hapus </span><i class="fas fa-regular fa-trash"></i></a>
                        </td>
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
            $('#barangmasuk').DataTable();
        });
    </script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctw = document.getElementById('myLineChart');
          
            new Chart(ctw, {
              type: 'line',
              data: {
                labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober',
                         'November','Desember'],
                datasets: [{
                  label: 'Jumlah',
                  data: [{{$masukjan}}, {{$masukfeb}}, {{$masukmar}}, {{$masukapr}}, {{$masukmei}},
                   {{$masukjun}}, {{$masukjul}},
                   {{$masukagu}}, {{$masuksep}}, {{$masukokt}}, {{$masuknov}}, {{$masukdes}},],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script> --}}
@endsection