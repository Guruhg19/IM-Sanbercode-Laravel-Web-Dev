@extends('layout.master')

@section('judul')
Halaman Tambah Buku
@endsection

@section('content')
<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  @csrf
<div class="mb-3">
  <label class="form-label">Judul Buku</label>
  <input type="text" class="form-control" name="title">
</div>

<div class="mb-3">
  <label class="form-label">Summary</label>
  <textarea name="summary" class="form-control" cols="30" rows="10"></textarea>
</div>

<div class="mb-3">
  <label class="form-label">Image</label>
  <input type="file" class="form-control" name="images">
</div>

<div class="mb-3">
  <label class="form-label">Stock</label>
  <input type="number" class="form-control" name="stock" required min="0">
</div>

<div class="mb-3">
  <label class="form-label">Category</label>
  <select class="form-control" name="category_id">
    <option value="">--Pilih Kategory--</option>
    @forelse ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @empty
        <option value="">Belum Ada Kategory</option>
    @endforelse
  </select>
</div>

<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<br><br>  
<a href="{{ route('book.index') }}" class="btn btn-secondary btn-sm">Kembali ke Halaman Buku</a>
@endsection