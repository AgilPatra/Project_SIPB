@extends('layouts.main')
@section('title','barangkeluar-delete')
@section('content')
<h2>Hapus Data {{$barangkeluar->id}} ({{$barangkeluar->kodebarang}}--{{$barangkeluar->barang['namabarang']}})</h2>
<hr>
<form style="display: inline-block" action="/barangkeluar-destroy/{{$barangkeluar->id}}" method="POST">
    @csrf
    @method('delete')
<button type="submit" class="btn btn-danger">Hapus</button>
</form>
<a href="/barangkeluar" class="btn btn-primary">Batal</a>
@endsection