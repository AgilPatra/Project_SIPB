@extends('layouts.main')
@section('title','CetakBahanBaku')
@section('content')

<h1>Cetak Laporan Bahan Baku</h1>
<hr>
<div class="content">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3>Cetak</h3>
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                    <label for="label">Tanggal Awal</label>
                    <input type="datetime-local" name="tglawal" id="tglawal" class="form-control ml-3" >
            </div>
            <div class="input-group mb-3">
                <label for="label">Tanggal Akhir</label>
                <input type="datetime-local" name="tglakhir" id="tglakhir" class="form-control ml-2">
        </div>
        <div class="input-group mb-3">
            <a href="" onclick="this.href='/cetakbahanbakupertanggal/'+document.getElementById('tglawal').value +
            '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-0 mt-2">Cetak</a>
           
        </div>
        </div>
    </div>
</div>


@endsection

