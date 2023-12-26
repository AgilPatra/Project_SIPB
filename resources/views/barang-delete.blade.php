@extends('layouts.main')
@section('title','buku-delete')
@section('content')
<h2>Hapus Data {{$buku->id}} ({{$buku->id}}) </h2>
<hr>

<form style="display: inline-block" action="/buku-destroy/{{$buku->id}}" method="POST">
    @csrf
    @method('delete')
<button type="submit" class="btn btn-danger">Hapus</button>
</form>
<a href="/buku" class="btn btn-primary">Batal</a>
@endsection