@extends('layouts.main')
@section('title','barangmasuk-edit')
@section('content')
<h2>Silahkan Masukkan Edit Data Bahan Baku Masuk</h2>
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
    <form action="/barangmasuk/{{$barangmasuk->id}}" method="POST">    
        @csrf 
        @method('PUT')  
        {{-- <div class="mb-3">
            <label for="id">Id Barang Masuk</label>
            <input type="id" class="form-control" name="id" id="id"
              value="{{$barangmasuk->id}}" required>
        </div> --}}
        <div class="mb-3">
            <label for="id_pproduksi">id Permintaan Produksi</label>
            <select name="id_pproduksi" id="id_pproduksi" class="form-control" required>
                <option value="{{$barangmasuk->id_pproduksi}}">{{$barangmasuk->pproduksi['id']}}|
                    {{$barangmasuk->pproduksi['kodebarang']}}|{{$barangmasuk->pproduksi['tglpermintaan']}}|
                    {{$barangmasuk->pproduksi['jmlpermintaan']}}</option>
                @foreach ($pproduksi as $data)
                    <option value="{{$data->id}}">{{$data->id}}|{{$data->kodebarang}}|{{$data->tglpermintaan}}|
                        {{$data->jmlpermintaan}}|</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_produksi">Id Produksi</label>
            <input type="text" class="form-control" name="id_produksi" id="id_produksi"  
            value="{{$barangmasuk->id_produksi}}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_produksi">Tanggal Produksi</label>
            <input type="datetime-local" class="form-control" name="tanggal_produksi" id="tanggal_produksi"  
            value="{{$barangmasuk->tanggal_produksi}}" required>
        </div>
        <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <select name="kodebarang" id="kodebarang" class="form-control" required>
                <option value="{{$barangmasuk->kodebarang}}">{{$barangmasuk->kodebarang}} --
                    {{$barangmasuk->barang['namabarang']}}</option>
                @foreach ($barang as $data)
                    <option value="{{$data->kodebarang}}">{{$data->kodebarang}}-{{$data->namabarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tglmasuk">Tanggal Masuk</label>
            <input type="datetime-local" class="form-control" name="tglmasuk" id="tglmasuk"  
            value="{{$barangmasuk->tglmasuk}}" required>
        </div>
        <div class="mb-3">
            <label for="jmlahmasuk">Jumlah Masuk</label>
            <input type="text" class="form-control" name="jmlahmasuk" id="jmlahmasuk"  
            value="{{$barangmasuk->jmlahmasuk}}" required>
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">
                <span>Update </span><i class="fas fa-light fa-download"></i></button>
        </div>
        
    </form>
</div>
@endsection