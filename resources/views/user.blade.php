@extends('layouts.main')
@section('title','User')
@section('content')

<div class="mb-4">
<h1>user</h1>
<hr>
</div>
<div class="my-2 mb-4"><a href="user-add" class="btn btn-primary"><span>Tambah </span>
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

    <table class="table table-bordered">
        <thead>
            <tr class="table table-bordered; table-info">
                <th>Id User</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userList as $data)
                <tr class="table table-bordered">
                    
                    <td>{{$data->id}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->password}}</td>
                    <td>{{$data->role}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->jabatan}}</td>
                    <td>
                        <a href="user-edit/{{$data->id}}" 
                            class="btn btn-primary"><span>Edit </span><i class="fas fa-regular fa-pen"></i></a>
                        <a href="user-delete/{{$data->id}}" 
                            class="btn btn-secondary"><span>Hapus </span><i class="fas fa-regular fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-9">
    {{$userList->links()}}
</div>

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

