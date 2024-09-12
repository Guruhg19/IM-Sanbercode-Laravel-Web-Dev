@extends('layout.master')

@section('judul')
Halaman Detail dari buku {{ $book->title }}
@endsection

@section('content')
    <img src="{{ asset('uploads/'.$book->images) }}" class="d-block mx-auto rounded-sm mb-4" width="60%" height="300px" alt="{{ $book->title }}">
    <h1 class="text-primary">{{ $book->title }}</h1>
    <p>{{ $book->summary }}</p>


  <h4 class="text-info mt-5">Daftar Peminjam</h4>
  <hr>
  @forelse ($book->listBorrows as $borrow)
  <div class="card mb-3">
      <div class="card-header">
          {{ $borrow->createBy->name }}
      </div>
      <div class="card-body">
          <p class="card-text">
              Nama User : <strong>{{ $borrow->createBy->name }}</strong><br>
              Tanggal Peminjaman: <strong>{{ \Carbon\Carbon::parse($borrow->tanggal_peminjaman)->translatedFormat('d F Y') }}</strong><br>
              Tanggal Pengembalian: <strong>{{ \Carbon\Carbon::parse($borrow->tanggal_pengembalian)->translatedFormat('d F Y') }}</strong>
          </p>
      </div>
  </div>
@empty
  <p>Belum ada yang meminjam buku ini.</p>
@endforelse
<br><br>

  @auth
  <hr>
  <h4 class="text-info">Form Peminjaman Buku</h4>
  <hr>
    <form action="/borrow/{{ $book->id }}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
          <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
      </div>
      <div class="mb-3">
          <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
          <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
      </div>
      <input type="submit" value="Kirim" class="btn btn-primary mb-5">
  </form>
  @endauth
    <a href="{{ route('book.index') }}" class="btn btn-secondary btn-sm">Kembali ke Halaman Buku</a>
@endsection