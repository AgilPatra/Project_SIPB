@extends('layouts.main')
@section('title','permintaanbarang-add')
@section('content')
<h2>Silahkan Masukkan Data Permintaan Barang</h2>
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

    <form action="permintaanbarang" method="POST">
        @csrf
        @if (Auth::user()->role != 1)
        @else
        {{-- <div class="mb-3">
            <label for="id">Id Permintaan Barang</label>
            <input type="text" class="form-control" name="id" id="id">
        </div> --}}
        <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <select name="kodebarang" id="kodebarang" class="form-control">
                <option value=""></option>
                @foreach ($barang as $data)
                    <option value="{{$data->kodebarang}}">{{$data->kodebarang}}-{{$data->namabarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tglpermintaan">Tanggal Permintaan</label>
            <input type="datetime-local" class="form-control" name="tglpermintaan" id="tglpermintaan">
        </div>
        <div class="mb-3">
            <label for="jmlpermintaan">Jumlah Permintaan</label>
            <input type="text" class="form-control" name="jmlpermintaan" id="jmlpermintaan">
        </div>
        @endif
        @if (Auth::user()->role != 2)
        @else
        <div class="mb-3">
            <label for="kgudang">Konfirmasi Gudang</label>
            <select name="kgudang" id="kgudang" class="form-control">
                    <option value="Pilih">Silahkan Pilih Konfirmasi</option>
                    <option value="Setuju">Setuju</option>
                    <option value="Belum Disetujui">Belum Setuju</option>
            </select>
        </div>
        @endif
        <div class="mb-3">
            <button class="btn btn-success" type="submit">
                <span>Simpan </span><i class="fas fa-light fa-download"></i></button>
        </div>
        </div>
    </form>
</div>
@endsection