@extends('layout.master')

@section('judul')
Halaman Tampil Detail Category
@endsection

@section('content')
  <h1 class="text-primary mb-3">{{ $category->name }}</h1>
  <h4>List Category</h4>
  <div class="row">
  @forelse ( $category->listBook as $item)
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <img src="{{ asset('uploads/'.$item->images) }}" class="card-img-top" alt="{{ $item->title }}" height="350px">
      <div class="card-body">
        <h4 class="mb-3 font-weight-bold">{{ $item->title }}</h4>
        <p class="card-text text-justify">{{ Str::limit($item->summary, 200) }}</p>
        <a href="/book/{{ $item->id }}" class="btn btn-primary btn-block">Baca Selengkapnya</a>
      </div>
    </div>
  </div>
    @empty
      <h7 class="mb-5 ml-3">Tidak ada Buku di Kategori ini</h7>
    @endforelse
  </div>
  <a href="{{ route('category') }}" class="btn btn-primary btn-sm">Lihat Daftar Category</a>
@endsection