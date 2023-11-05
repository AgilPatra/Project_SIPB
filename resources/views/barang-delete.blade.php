@extends('layouts.main')
@section('title','barang-delete')
@section('content')
<h2>Hapus Data {{$barang->kodebarang}} ({{$barang->kodebarang}}) </h2>
<hr>

<form style="display: inline-block" action="/barang-destroy/{{$barang->kodebarang}}" method="POST">
    @csrf
    @method('delete')
<button type="submit" class="btn btn-danger">Hapus</button>
</form>
<a href="/barang" class="btn btn-primary">Batal</a>
@endsection