@extends('layout.app')
@section('title', 'Dashboard')
@section('content')

 <!-- Salin navbar dari dashboard atau hapus jika tidak ingin -->
  <div class="container mt-5">
    <h2>Tambah Data Dosen</h2>

    <form action="/dosen/update" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nidn" class="form-label">NIDN</label>
          <input type="text" class="form-control" name="nidn" id="nidn" value="{{ $dosen['nidn'] }}" required readonly>
        </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ $dosen['nama'] }}" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $dosen['email'] }}" required>
      </div>
      <div class="mb-3">
        <label for="prodi" class="form-label">Program Studi</label>
        <input type="text" class="form-control" name="prodi" id="prodi" value="{{ $dosen['prodi'] }}" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="/dosen" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

@endsection
