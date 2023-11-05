@extends('layouts.main')
@section('title','user-add')
@section('content')
<h2>Silahkan Masukkan Data User</h2>
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
    <form action="user" method="POST">
        @csrf
        {{-- <div class="mb-3">
            <label for="id">Id User</label>
            <input type="text" class="form-control" name="id" id="id" required>
        </div> --}}
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password">
        </div>
            <div class="mb-3">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama">
         </div>
         <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-control">
                <option value="Admin">Admin</option>
                <option value="Gudang">Gudang</option>
                <option value="Pimpinan">Pimpinan</option>
                <option value="Produksi">Produksi</option>
            </select>
         </div>
        <div class="mb-3">
            <button class="btn btn-success" 
            type="submit"><span>Simpan </span><i class="fas fa-light fa-download"></i></button>
        </div>
        </div>
    </form>
</div>
@endsection