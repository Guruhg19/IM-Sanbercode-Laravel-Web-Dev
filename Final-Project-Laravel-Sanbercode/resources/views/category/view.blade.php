@extends('layout.master')

@section('judul')
Halaman Tampil Category
@endsection

@section('content')
@if (session('success'))
{{-- merupakan sebuah pengecekan -> apakah di dalam session terdapat session dengan nama success jika ada maka akan menampilkan pesan success --}}
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
@endif
  <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">Tambah Kategori</a>
<br><br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($categories as $key=> $category)
      <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{ $category->name }}</td>
        <td>
          <form action="/category/{{ $category->id }}" method="post" onsubmit="return confirm('Apakah yakin untuk menghapus data ?')">
          <a href="/category/{{ $category->id }}" class="btn btn-info">Detail</a>
          <a href="/category/{{ $category->id }}/edit" class="btn btn-secondary">Edit</a>
          @csrf
          @method('delete')
          <input type="submit" class="btn btn-danger" value="Delete" >
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td>Category Empty</td>
      </tr>
      @endforelse
    </tbody>
  </table>
@endsection