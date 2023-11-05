@extends('layouts.main')
@section('title','PermintaanBarang')
@section('content')

<div class="mb-4">
    <h1>Data Permintaan Barang</h1>
    <hr>
    </div>
    
    @if (Auth::user()->role != 1)
    @else
<div class="my-2 mb-4">
    <a href="permintaanbarang-add" 
    class="btn btn-primary"><span>Tambah </span><i class="fas fa-regular fa-plus"></i></a>
</div>
@endif
@if (Session::has('status'))
<div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
<table id="permintaanbarang" class="table table-bordered">
    <thead>
        <tr class="table table-bordered; table-info">
                    <th>ID Permintaan Barang</th>
                    <th>Kode Barang</th>
                    <th>Tanggal Permintaan</th>
                    <th>Jumlah Permintaan</th>      
                    <th>Konfirmasi Gudang</th>           
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permintaanbarangList as $data)
                <tr class="table table-bordered">
                        <td>{{$data->id}}</td>
                        <td>{{$data->kodebarang}}</td>
                        <td>{{$data->tglpermintaan}}</td>
                        <td>{{$data->jmlpermintaan}}</td>         
                        <td>{{$data->kgudang}}</td>

                        @if (Auth::user()->role != 1)
                        @else
                        <td>
                            <a href="permintaanbarang-edit/{{$data->id}}" class="btn btn-primary"><span>Edit </span><i class="fas fa-regular fa-pen"></i></a>
                            <a href="permintaanbarang-delete/{{$data->id}}" class="btn btn-secondary"><span>Hapus </span><i class="fas fa-regular fa-trash"></i></a>
                        </td>
                        @endif

                        @if (Auth::user()->role != 2 && Auth::user()->role != 3)
                        @else
                        <td>
    <a href="permintaanbarang-edit/{{$data->id}}" 
     class="btn btn-primary"><span>Konfirmasi Permintaan </span><i class="fas fa-regular fa-pen"></i></a>
     <a href="permintaanbarang-edit/{{$data->id}}" 
        class="btn btn-primary"><span>Edit Konfirmasi Permintaan </span><i class="fas fa-regular fa-pen"></i></a>
                        </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
        <div class="my-9">
            {{$permintaanbarangList->links()}}
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
        <script>
            $(document).ready(function() {
                $('#permintaanbarang').DataTable();
            });
        </script>
@endsection