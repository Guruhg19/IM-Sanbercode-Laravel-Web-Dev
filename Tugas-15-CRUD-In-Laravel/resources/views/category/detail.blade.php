@extends('layout.master')

@section('judul')
Halaman Tampil Detail Category
@endsection

@section('content')
<h1 class="text-primary">{{ $category->name }}</h1>
<br><br>
<a href="{{ route('category') }}" class="btn btn-primary btn-sm">Lihat Daftar Category</a>
@endsection