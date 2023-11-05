@extends('layouts.main')
@section('title','barang-edit')
@section('content')

<h2>Silahkan Masukkan Edit Data Barang</h2>

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
    <form action="/barang/{{$barang->kodebarang}}" method="POST">    
        @csrf 
        @method('PUT')  
        {{-- <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <input type="text" class="form-control" name="kodebarang" id="kodebarang" 
            value="{{$barang->kodebarang}}" required>
        </div> --}}
       <div class="mb-3">
            <label for="namabarang">Nama Barang</label>
            <input type="text" class="form-control" name="namabarang" id="namabarang" value="{{$barang->namabarang}}" 
            required>
        </div>
        <div class="mb-3">
            <label for="stok">Stok</label>
            <input type="text" class="form-control" name="stok" id="stok" value="{{$barang->stok}}" required>
        </div>
        <div class="mb-3">
            <label for="jenis">Jenis</label>
            <select name="jenis" id="jenis" class="form-control"  required>
                <option value="Bangku">Bangku</option>
                <option value="Cermin">Cermin</option>
                <option value="Dekorasi">Dekorasi</option>
                <option value="Lampu">Lampu</option>
                <option value="Meja">Meja</option>
                <option value="Rak">Rak</option>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-success" 
            type="submit"><span>Update </span><i class="fas fa-light fa-download"></i></button>
        </div>
        
    </form>
</div>
@endsection