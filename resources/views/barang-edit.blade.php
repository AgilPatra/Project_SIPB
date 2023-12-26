@extends('layouts.main')
@section('title','buku-edit')
@section('content')

<h2>Silahkan Masukkan Edit Data buku</h2>

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
<div class="mt-5 col-8 ml-5">
    <form action="/buku/{{$buku->id}}" method="POST">    
        @csrf 
        @method('PUT')  
        {{-- <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <input type="text" class="form-control" name="kodebarang" id="kodebarang" 
            value="{{$barang->kodebarang}}" required>
        </div> --}}
       <div class="mb-3">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{$buku->judul}}" 
            required>
        </div>
        <div class="mb-3">
            <label for="id_penulis">Penulis</label>
            <select name="id_penulis" id="id_penulis" class="form-control" required>
                <option value="{{$buku->id}}">{{$buku->id}} --
                    {{$buku->penulis['nama_penulis']}}</option>
                @foreach ($penulis as $data)
                    <option value="{{$data->id}}">{{$data->id}}-{{$data->nama_penulis}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_penerbit">Penerbit</label>
            <select name="id_penerbit" id="id_penerbit" class="form-control" required>
                <option value="{{$buku->id}}">{{$buku->id}} --
                    {{$buku->penerbit['nama_penerbit']}}</option>
                @foreach ($penerbit as $data)
                    <option value="{{$data->id}}">{{$data->id}}-{{$data->nama_penerbit}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                <option value="{{$buku->id}}">{{$buku->id}} --
                    {{$buku->kategori['nama_kategori']}}</option>
                @foreach ($kategori as $data)
                    <option value="{{$data->id}}">{{$data->id}}-{{$data->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" required>
        </div>
        <div class="mb-3">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn" id="isbn" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_tersedia">Jumlah</label>
            <input type="text" class="form-control" name="jumlah_tersedia" id="jumlah_tersedia" required>
        </div>
        <div class="mb-3">
            <button class="btn btn-success" 
            type="submit"><span>Update </span><i class="fas fa-light fa-download"></i></button>
        </div>
        
    </form>
</div>
@endsection