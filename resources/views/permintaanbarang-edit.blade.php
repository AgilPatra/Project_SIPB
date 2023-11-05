@extends('layouts.main')
@section('title','permintaanbarang-edit')
@section('content')
<h2>Silahkan Masukkan Edit Data Permintaan Bahan Baku</h2>
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
    <form action="/permintaanbarang/{{$permintaanbarang->id}}" method="POST">    
        @csrf 
        @method('PUT')  
        @if (Auth::user()->role != 1)
        @else
        {{-- <div class="mb-3">
            <label for="id">Id Permintaan Barang</label>
            <input type="text" class="form-control" name="id" 
            id="id"  value="{{$permintaanbarang->id}}" required>
        </div> --}}
        <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <select name="kodebarang" id="kodebarang" class="form-control" required>
                <option value="{{$permintaanbarang->kodebarang}}">{{$permintaanbarang->kodebarang}}
                    --
                    {{$permintaanbarang->barang['namabarang']}}</option>
                @foreach ($barang as $data)
                <option value="{{$data->kodebarang}}">{{$data->kodebarang}}-{{$data->namabarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tglpermintaan">Tanggal Permintaan</label>
            <input type="datetime-local" class="form-control" name="tglpermintaan" id="tglpermintaan" required >
        </div>
        <div class="mb-3">
            <label for="jmlpermintaan">Jumlah Permintaan</label>
            <input type="text" class="form-control" name="jmlpermintaan" id="jmlpermintaan"
            value="{{$permintaanbarang->jmlpermintaan}}"  required>
        </div>
        @endif
        @if (Auth::user()->role != 3)
        @else
        <div class="mb-3">
            <label for="kpimpinan">Konifrmasi Pimpinan</label>
            <select name="kpimpinan" id="kpimpinan" class="form-control" required>
                <option value="Setuju">Setuju</option>
                <option value="Belum Disetujui">Belum Setuju</option>
            </select>
        </div>
        @endif
        @if (Auth::user()->role != 2)
        @else
        <div class="mb-3">
            <label for="kgudang">Konfirmasi Gudang</label>
            <select name="kgudang" id="kgudang" class="form-control" required>
                <option value="Setuju">Setuju</option>
                <option value="Belum Disetujui">Belum Setuju</option>
            </select>
        </div>
        @endif
        <div class="mb-3">
            <button class="btn btn-success" type="submit">
                <span>Update </span><i class="fas fa-light fa-download"></i></button>
        </div>
    </form>
</div>
@endsection