@extends('layouts.main')
@section('title','buku-add')
@section('content')

<h2>Silahkan Masukkan Data Buku</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<hr>
    <form action="buku" method="POST">
        @csrf
        <div class="mb-3">
            <label for="">Id</label>
            <input type="text" class="form-control" name="id" id="id" required>
        </div>
        <div class="mb-3">
            <label for="">Judul</label>
            <input type="text" class="form-control" name="judul" id="namabarang" required>
        </div>
        <div class="mb-3">
            <label for="id_penulis">Penulis</label>
            <select name="id_penulis" id="id_penulis" class="form-control" required>
                <option value=""></option>
                @foreach ($penulis as $data)
                    <option value="{{$data->id}}">{{$data->id}}-{{$data->nama_penulis}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_penerbit">Penerbit</label>
            <select name="id_penerbit" id="id_penerbit" class="form-control" required>
                <option value=""></option>
                @foreach ($penerbits as $data)
                    <option value="{{$data->id}}">{{$data->id}}-{{$data->nama_penerbit}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                <option value=""></option>
                @foreach ($kategoris as $data)
                    <option value="{{$data->id}}">{{$data->id}}-{{$data->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn" id="isbn" >
        </div>
        <div class="mb-3">
            <label for="jumlah_tersedia">Jumlah Tersedia</label>
            <input type="text" class="form-control" name="jumlah_tersedia" id="jumlah_tersedia" >
        </div>
        <div class="mb-3">
            <button class="btn btn-success" 
            type="submit"><span>Simpan </span><i class="fas fa-light fa-download"></i></button>
        </div>
        </div>
    </form>
</div>
@endsection