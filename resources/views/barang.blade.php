@extends('layouts.main')
@section('title','Buku')
@section('content')

<div class="mb-4">
<h1>Buku</h1>
<hr>
</div>
<div class="my-2 mb-4"><a href="buku-add" class="btn btn-primary"><span>Tambah </span>
    <i class="fas fa-regular fa-plus"></i></a></div>

@if (Session::has('status'))
<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
@endif

{{-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-white"></i>
            <span> Bahan Baku </span></h6>
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
                    <canvas id="myL"></canvas>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</div> --}}
<div class="card shadow mb-4">
<div class="card-body">
<table id="bukuTable" >
    <thead>
        <tr class="table table-bordered; table-info" >
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            <th>Tahun Terbit</th>
            <th>ISBN</th>
            <th>Jumlah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bukuList as $data)
            <tr class="table table-bordered">
                <td>{{$data->id}}</td>
                <td>{{$data->judul}}</td>
                <td>{{$data->id_penulis}}</td>
                <td>{{$data->id_penerbit}}</td>
                <td>{{$data->id_kategori}}</td>
                <td>{{$data->tahun_terbit}}</td>
                <td>{{$data->isbn}}</td>
                <td>{{$data->jumlah_tersedia}}</td>
                <td>
                    <a href="barang-edit/{{$data->id}}" class="btn btn-primary"><span>Edit </span><i class="fas fa-regular fa-pen"></i></a>
                    <a href="barang-delete/{{$data->id}}" class="btn btn-secondary"><span>Hapus </span><i class="fas fa-regular fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

    <div class="my-9">
    {{$bukuList->links()}}
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#bukuTable').DataTable();
    });
</script>
    
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctq = document.getElementById('myL');
  
    new Chart(ctq, {
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

