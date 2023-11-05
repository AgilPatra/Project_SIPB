@extends('layouts.main')
@section('title','user-edit')
@section('content')
<h2>Silahkan Masukkan Edit Data user</h2>
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
    <form action="/user/{{$user->id}}" method="POST">    
        @csrf 
        @method('PUT')  
        {{-- <div class="mb-3">
            <label for="id">Id User</label>
            <input type="text" class="form-control" name="id" id="id" 
            value="{{$user->id}}" required>
        </div> --}}
       <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" 
            required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password" value="{{$user->password}}" required>
        </div>
        <div class="mb-3">
            <label for="role">role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{$user->nama}}" required>
        </div>
        <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-control" required>
                <option value="Admin">Admin</option>
                <option value="Gudang">Gudang</option>
                <option value="Pimpinan">Pimpinan</option>
                <option value="Produksi">Produksi</option>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-success" 
            type="submit"><span>Update </span><i class="fas fa-light fa-download"></i></button>
        </div>
        
    </form>
</div>
@endsection