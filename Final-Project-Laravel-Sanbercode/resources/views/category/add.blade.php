@extends('layout.master')
@section('judul')
Halaman Tambah Kategory
@endsection

@section('content')
  <form action="{{ route('category.post') }}" method="POST">
    @if (session('success'))
    {{-- merupakan sebuah pengecekan -> apakah di dalam session terdapat session dengan nama success jika ada maka akan menampilkan pesan success --}}
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
    @endif
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
    <form action="{{ route('category') }}" method="POST" >
      <div class="mb-3">
        <label class="form-label">Nama Kategory</label>
        <input type="text" class="form-control" name="name">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <br><br>  
    <a href="{{ route('category') }}" class="btn btn-secondary btn-sm">Kembali ke Kategori</a>

@endsection


