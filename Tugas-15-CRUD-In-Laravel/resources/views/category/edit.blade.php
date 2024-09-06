@extends('layout.master')
@section('judul')
Halaman Edit Kategory
@endsection

@section('content')
  <form action="/category/{{ $category->id }}" method="POST">
    @method("put")
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
      <div class="mb-3">
        <label class="form-label" >Nama Kategory</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
@endsection


