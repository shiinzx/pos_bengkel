@extends('templates.layout')
@section('content')
<h2>Buku Pages</h2>
<div>
    <div>
        <a class="btn btn-primary" href="{{ route('buku.create') }}">Tambah Buku</a>
    </div>
    
    @include('buku.form')
    @include('buku.data')
</div>
@endsection