@extends('layouts.main')
@section('title','barangkeluar-edit')
@section('content')
<h2>Silahkan keluarkan Edit Data Barang Keluar</h2>
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
    <form action="/barangkeluar/{{$barangkeluar->id}}" method="POST">    
        @csrf 
        @method('PUT')  
        {{-- <div class="mb-3">
            <label for="id">Id Barang keluar</label>
            <input type="id" class="form-control" name="id" id="id"  value="{{$barangkeluar->id}}" >
        </div> --}}
        <div class="mb-3">
            <label for="id_pbarang">id Permintaan Barang</label>
            <select name="id_pbarang" id="id_pbarang" class="form-control" required>
                <option value="{{$barangkeluar->id_pbarang}}">{{$barangkeluar->pbarang['id']}}|
                    {{$barangkeluar->pbarang['kodebarang']}}|{{$barangkeluar->pbarang['tglpermintaan']}}|
                    {{$barangkeluar->pbarang['jmlpermintaan']}}</option>
                @foreach ($pbarang as $data)
                    <option value="{{$data->id}}">{{$data->id}}|{{$data->kodebarang}}|{{$data->tglpermintaan}}|
                        {{$data->jmlpermintaan}}|</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kodebarang">Kode Barang</label>
            <select name="kodebarang" id="kodebarang" class="form-control" required>
                <option value="{{$barangkeluar->kodebarang}}">{{$barangkeluar->kodebarang}} --
                    {{$barangkeluar->barang['namabarang']}}</option>
                @foreach ($barang as $data)
                    <option value="{{$data->kodebarang}}">{{$data->kodebarang}}-{{$data->namabarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tglkeluar">Tanggal keluar</label>
            <input type="datetime-local" class="form-control" name="tglkeluar" id="tglkeluar" required>
        </div>
        <div class="mb-3">
            <label for="jmlahkeluar">Jumlah keluar</label>
            <input type="text" class="form-control" name="jmlahkeluar" id="jmlahkeluar" required>
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit"><span>Update </span><i class="fas fa-light fa-download"></i></button>
        </div>
        
    </form>
</div>
@endsection