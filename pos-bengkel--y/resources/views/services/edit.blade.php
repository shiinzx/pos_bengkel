@extends('layouts.app')
@section('title','Edit Service')
@section('content')
<div class="card">
<div class="card-body">
<form action="{{ route('services.update',$service) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3">
<label class="form-label">Nama Service</label>
<input name="nama" value="{{ old('nama',$service->nama) }}" class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Harga</label>
<input name="harga" value="{{ old('harga',$service->harga) }}" class="form-control" type="number" required>
</div>
<button class="btn btn-primary">Update</button>
<a href="{{ route('services.index') }}" class="btn btn-link">Cancel</a>
</form>
</div>
</div>
@endsection