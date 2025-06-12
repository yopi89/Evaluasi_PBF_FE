@extends('layout.app')
@section('title', 'Dashboard')
@section('content')

  <div class="container mt-4">
    <h2>Data Mahasiswa</h2>
    <a href="/mahasiswa/create" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>NIM</th>
          <th>Email</th>
          <th>Prodi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        {{-- @dd($mahasiswa); --}}

        @foreach($mahasiswa as $d)
        <tr>
            {{-- @dd($d); --}}
          <td>{{ $d['nama'] }}</td>
          <td>{{ $d['nim'] }}</td>
          <td>{{ $d['email'] }}</td>
          <td>{{ $d['prodi'] }}</td>
          <td>
            <a href="/mahasiswa/edit/{{ $d['nim'] }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="/mahasiswa/delete/{{ $d['nim'] }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
