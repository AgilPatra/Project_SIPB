@extends('layouts.main')
@section('title','barangkeluar-add')
@section('content')
<h2>Silahkan Masukkan Data Bahan Baku Keluar</h2>
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
    <form action="barangkeluar" method="POST">
        @csrf
        {{-- <div class="mb-3">
            <label for="id">Id Barang keluar</label>
            <input type="id" class="form-control" name="id" id="id">
        </div> --}}
        <div class="mb-3">
            <label for="id_pbarang">Id Permintaan Barang</label>
            <select name="id_pbarang" id="id_pbarang" class="form-control" >
                <option value=""></option>
                @foreach ($pbarang as $data)
                    <option value="{{$data->id}}">{{$data->id}}|{{$data->kodebarang}}|{{$data->tglpermintaan}}|
                        {{$data->jmlpermintaan}}|</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <select name="kodebarang" id="kodebarang" class="form-control" >
                <option value=""></option>
                @foreach ($barang as $data)
                    <option value="{{$data->kodebarang}}">{{$data->kodebarang}}-{{$data->namabarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tglkeluar">Tanggal keluar</label>
            <input type="datetime-local" class="form-control" name="tglkeluar" id="tglkeluar" >
        </div>
        <div class="mb-3">
            <label for="jmlahkeluar">Jumlah keluar</label>
            <input type="text" class="form-control" name="jmlahkeluar" id="jmlahkeluar" >
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">
                <span>Simpan </span><i class="fas fa-light fa-download"></i></button>
        </div>
        </div>
    </form>
</div>
@endsection