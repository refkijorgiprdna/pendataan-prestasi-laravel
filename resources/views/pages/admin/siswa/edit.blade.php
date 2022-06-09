@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Edit Data Siswa</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('siswa.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for='name'>Nama</label>
                    <input class='form-control @error('name') is-invalid @enderror' type='text' name='name' id='name' placeholder='Masukkan Nama' value='{{ $item->name }}' />
                </div>
                <div class="form-group">
                    <label for='email'>Email</label>
                    <input class='form-control @error('email') is-invalid @enderror' type='email' name='email' id='email' placeholder='Masukkan Email' value='{{ $item->email }}' />
                </div>
                <div class="form-group">
                    <label for='password'>Password</label>
                    <input class='form-control @error('password') is-invalid @enderror' type='password' name='password' id='password' placeholder='Masukkan Password' value='{{ old('password') }}' />
                </div>
                <div class="form-group">
                    <label for='password_confirmation'>Konfirmasi Password</label>
                    <input class='form-control @error('password_confirmation') is-invalid @enderror' type='password' name='password_confirmation' id='password_confirmation' placeholder='Masukkan Konfirmasi Password' value='{{ old('password_confirmation') }}' />
                </div>
                <button type='submit' class='btn btn-primary btn-block py-2'>Simpan</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
