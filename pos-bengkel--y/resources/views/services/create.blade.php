@extends('layouts.app')
@section('title', 'Add Service')

@section('content')
<div class="max-w-4xl mx-auto bg-[#0f1a2e] border border-blue-700 rounded-xl p-8 shadow-xl mt-5">
    
    <h1 class="text-3xl font-bold text-blue-300 mb-6 tracking-wide">
        🛠 Add New Service
    </h1>

    <form action="{{ route('services.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="text-gray-300 text-sm font-semibold">Nama Service</label>
            <input type="text" name="nama"
                class="w-full mt-1 bg-[#1b2642] text-gray-200 border border-blue-800 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Contoh: Ganti Oli, Tune Up, Servis Rem..." required>
        </div>

        <div>
            <label class="text-gray-300 text-sm font-semibold">Harga</label>
            <input type="number" name="harga"
                class="w-full mt-1 bg-[#1b2642] text-gray-200 border border-blue-800 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Masukkan harga service" required>
        </div>

        <div>
            <label class="text-gray-300 text-sm font-semibold">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" rows="3"
                class="w-full mt-1 bg-[#1b2642] text-gray-200 border border-blue-800 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Masukkan info tambahan service"></textarea>
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button
                class="bg-gradient-to-r from-blue-500 to-blue-700 hover:shadow-blue-500/50 shadow text-white px-6 py-3 rounded-lg font-semibold transition">
                💾 Save
            </button>

            <a href="{{ route('services.index') }}"
               class="text-red-400 hover:text-red-500 transition font-semibold">
                ✖ Cancel
            </a>
        </div>
    </form>
</div>
@endsection
