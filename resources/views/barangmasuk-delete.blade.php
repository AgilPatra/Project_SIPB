@extends('layouts.main')
@section('title','barangmasuk-delete')
@section('content')
<h2>Hapus Data {{$barangmasuk->id}} ({{$barangmasuk->kodebarang}}--{{$barangmasuk->barang['namabarang']}})</h2>
<hr>
<form style="display: inline-block" action="/barangmasuk-destroy/{{$barangmasuk->id}}" method="POST">
    @csrf
    @method('delete')
<button type="submit" class="btn btn-danger">Hapus</button>
</form>
<a href="/barangmasuk" class="btn btn-primary">Batal</a>
@endsection