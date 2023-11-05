@extends('layouts.main')
@section('title','permintaanbarang-delete')
@section('content')
<h2>Hapus Data {{$permintaanbarang->id}} 
    ({{$permintaanbarang->kodebarang}}--{{$permintaanbarang->barang['namabarang']}}) </h2>
<hr>

<form style="display: inline-block" action="/permintaanbarang-destroy/{{$permintaanbarang->id}}" method="POST">
    @csrf
    @method('delete')
<button type="submit" class="btn btn-danger">Hapus</button>
</form>
<a href="/permintaanbarang" class="btn btn-primary">Batal</a>
@endsection