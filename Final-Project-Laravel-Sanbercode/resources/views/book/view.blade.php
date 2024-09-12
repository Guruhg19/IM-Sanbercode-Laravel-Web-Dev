@extends('layout.master')

@section('judul')
Halaman Tampil Buku
@endsection



@section('content')
    @if (session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
    @endif
      @auth
      <a href="{{ route('book.create') }}" class="btn btn-sm btn-primary mb-5">Tambah Data Buku</a>  
      @endauth


  <div class="container">
    <div class="row">
      @forelse ($book as $item)
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="{{ asset('uploads/'.$item->images) }}" class="card-img-top" alt="{{ $item->title }}" height="350px">
            <div class="card-body">
              <h4 class="font-weight-bold">{{ $item->title }}</h4>
              <span class="badge bg-success mb-2">{{ $item->category->name }}</span>
              <p class="card-text text-justify">{{ Str::limit($item->summary, 200) }}</p>
              <a href="/book/{{ $item->id }}" class="btn btn-primary btn-block">Baca Selengkapnya</a>

              @auth
              <div class="row mt-3">
                <div class="col">
                  <a href="/book/{{ $item->id }}/edit" class="btn btn-warning btn-block">Edit</a>
                </div>
                <div class="col">
                  <form action="/book/{{ $item->id }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete" class="btn btn-danger btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                  </form>
                </div>
              </div>
              @endauth
    
            </div>
          </div>
        </div>
      @empty
        <h7>Tidak ada data buku</h7>
      @endforelse
    </div>
  </div>
@endsection

