@extends('layouts.main')
@section('title','user-delete')
@section('content')
<h2>Hapus Data {{$user->id}} ({{$user->id}}) </h2>
<hr>

<form style="display: inline-block" action="/user-destroy/{{$user->id}}" method="POST">
    @csrf
    @method('delete')
<button type="submit" class="btn btn-danger">Hapus</button>
</form>
<a href="/user" class="btn btn-primary">Batal</a>
@endsection