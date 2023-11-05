@extends('layouts.main')
@section('title','barangmasuk-add')
@section('content')
<h2>Silahkan Masukkan Data Barang Masuk</h2>
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
    <form action="barangmasuk" method="POST">
        @csrf
        {{-- <div class="mb-3">
            <label for="id">Id Barang Masuk</label>
            <input type="id" class="form-control" name="id" id="id">
        </div> --}}
        {{-- <div class="mb-3">
            <label for="id_pproduksi">Id Permintaan Produksi</label>
            <select name="id_pproduksi" id="id_pproduksi" class="form-control" required>
                <option value=""></option>
                @foreach ($pproduksi as $data)
                    <option value="{{$data->id}}">{{$data->id}}|{{$data->kodebarang}}|{{$data->tglpermintaan}}|
                        {{$data->jmlpermintaan}}|</option>
                @endforeach
            </select>
        </div> --}}
        <div class="mb-3">
            <label for="id_produksi">Id Produksi</label>
            <input type="text" class="form-control" name="id_produksi" id="id_produksi" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_produksi">Tanggal Produksi</label>
            <input type="datetime-local" class="form-control" name="tanggal_produksi" id="tanggal_produksi" required>
        </div>
        <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <select name="kodebarang" id="kodebarang" class="form-control" required>
                <option value=""></option>
                @foreach ($barang as $data)
                    <option value="{{$data->kodebarang}}">{{$data->kodebarang}}-{{$data->namabarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tglmasuk">Tanggal Masuk</label>
            <input type="datetime-local" class="form-control" name="tglmasuk" id="tglmasuk" required>
        </div>
        <div class="mb-3">
            <label for="jmlahmasuk">Jumlah Masuk</label>
            <input type="text" class="form-control" name="jmlahmasuk" id="jmlahmasuk">
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">
                <span>Simpan </span><i class="fas fa-light fa-download"></i></button>
        </div>
        </div>
    </form>
</div>
@endsection