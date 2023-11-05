@extends('layouts.main')
@section('title','BarangKeluar')
@section('content')

<div class="mb-4">
    <h1>Data Barang Keluar</h1>
    <hr>
    </div>
<div class="my-2 mb-4">
  <a href="barangkeluar-add" class="btn btn-primary"><span>Tambah </span><i class="fas fa-regular fa-plus"></i></a></div>

@if (Session::has('status'))
<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
@endif

{{-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-white"></i>
            <span> Barang Keluar</span></h6>
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
                    <canvas id="myLine"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div> --}}
<div class="card shadow mb-4">
  <div class="card-body">
        <table id="barangkeluar" class="table table-bordered">
             <thead>
                  <tr class="table table-bordered; table-info">
                    <th>Id Keluar</th>
                    <th>Id Permintaan Barang</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Keluar</th>
                    <th>Jumlah Keluar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangkeluarList as $data)
                <tr class="table table-bordered">
                  <td>{{$data->id}}</td>
                  <td>{{$data->id_pbarang}}</td>
                  <td>{{$data->kodebarang}}</td>
                  <td>{{$data->barang['namabarang']}}</td>
                  <td>{{$data->tglkeluar}}</td>
                  <td>{{$data->jmlahkeluar}}</td>
                        <td>
                            <a href="barangkeluar-edit/{{$data->id}}" 
                              class="btn btn-primary"><span>Edit </span><i class="fas fa-regular fa-pen"></i></a>
                            <a href="barangkeluar-delete/{{$data->id}}" 
                              class="btn btn-secondary"><span>Hapus </span><i class="fas fa-regular fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>

        <div class="my-9">
            {{$barangkeluarList->links()}}
        </div>

        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctl = document.getElementById('myLine');
          
            new Chart(ctl, {
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#barangkeluar').DataTable();
    });
</script>

@endsection