@extends('layouts.app')

@section('content')
<div class="w-full max-w-4xl mx-auto bg-gray-900 border border-gray-700 rounded-2xl shadow-xl p-10">

    <h2 class="text-3xl font-bold text-blue-400 tracking-widest uppercase mb-8 text-center">
        Edit Data Customer
    </h2>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 font-semibold text-gray-300 tracking-wide">Nama Lengkap</label>
            <input
                type="text"
                name="nama"
                value="{{ old('nama', $customer->nama) }}"
                required
                class="w-full px-5 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-300 tracking-wide">No. Telepon</label>
            <input
                type="text"
                name="telp"
                value="{{ old('telp', $customer->telp) }}"
                required
                class="w-full px-5 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-300 tracking-wide">Alamat</label>
            <textarea
                name="alamat"
                rows="4"
                required
                class="w-full px-5 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('alamat', $customer->alamat) }}</textarea>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('customers.index') }}"
                class="px-6 py-3 bg-gray-700 hover:bg-gray-600 rounded-lg text-gray-200 font-semibold uppercase shadow transition tracking-wide">
                ❮ Kembali
            </a>

            <button
                type="submit"
                class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-bold uppercase tracking-wider shadow shadow-blue-900/60 transition">
                💾 Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
