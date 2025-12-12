@extends('templates.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tambah Customer</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer.store') }}" method="POST">
            @csrf

            <div class="form-group mb-2">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" 
                       value="{{ old('name') }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" 
                       value="{{ old('email') }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="address">Alamat</label>
                <input type="text" name="address" class="form-control" 
                       value="{{ old('address') }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="phone_number">No. Telepon</label>
                <input type="text" name="phone_number" class="form-control" 
                       value="{{ old('phone_number') }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="status">Status</label>
                <select name="status" class="form-select" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Member</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Non Member</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('customer.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection