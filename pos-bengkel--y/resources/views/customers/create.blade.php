@extends('layouts.app')

@section('content')
<div class="max-w-full rounded-xl bg-gray-900 shadow-xl p-8 border border-gray-700">

    <h2 class="text-3xl font-bold text-blue-400 mb-6 tracking-wider uppercase">
        Tambah Customer Bengkel
    </h2>

    <form action="{{ route('customers.store') }}" method="POST" class="grid grid-cols-2 gap-6 text-white">
        @csrf

        <div>
            <label class="block mb-1 text-sm text-gray-300">Nama Customer</label>
            <input type="text" name="name"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required>
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-300">Nomor HP</label>
            <input type="text" name="phone"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required>
        </div>

        <div class="col-span-2">
            <label class="block mb-1 text-sm text-gray-300">Alamat</label>
            <textarea name="address"
                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                rows="3"></textarea>
        </div>

        <div class="col-span-2 flex justify-between mt-4">
            <a href="{{ route('customers.index') }}"
                class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                ❮ Kembali
            </a>
            <button type="submit"
                class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-bold shadow-lg shadow-blue-900/60 transition uppercase tracking-wide">
                Simpan Customer
            </button>
        </div>
    </form>
</div>
@endsection
