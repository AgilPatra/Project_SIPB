@extends('layouts.main')
@section('title','barang-add')
@section('content')

<h2>Silahkan Masukkan Data Barang</h2>
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
    <form action="barang" method="POST">
        @csrf
        {{-- <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <input type="text" class="form-control" name="kodebarang" id="kodebarang" >
        </div> --}}
        <div class="mb-3">
            <label for="namabarang">Nama Barang</label>
            <input type="text" class="form-control" name="namabarang" id="namabarang" required>
        </div>
        <div class="mb-3">
            <label for="stok">Stok</label>
            <input type="text" class="form-control" name="stok" id="stok" required>
        </div>
            <div class="mb-3">
            <label for="jenis">Jenis</label>
            <select name="jenis" id="jenis" class="form-control" required>
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
            type="submit"><span>Simpan </span><i class="fas fa-light fa-download"></i></button>
        </div>
        </div>
    </form>
</div>
@endsection