@extends('layouts.app')

@section('content')
<div class="w-full bg-gray-900 border border-gray-700 rounded-xl shadow-xl p-8">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-blue-400 tracking-wider uppercase">
            Daftar Layanan Bengkel
        </h2>

        <a href="{{ route('services.create') }}"
            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold text-white shadow-lg shadow-blue-900/60 transition uppercase tracking-wide">
            + Tambah Service
        </a>
    </div>

    {{-- 🔍 Search --}}
    <form method="GET" action="{{ route('services.index') }}" class="mb-6">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama layanan..."
            class="w-1/3 px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
        <button class="ml-2 px-5 py-3 bg-gray-700 hover:bg-gray-600 rounded-lg text-white transition">
            Cari
        </button>
    </form>

    {{-- 🔥 Tabel Full --}}
    <div class="overflow-x-auto rounded-lg border border-gray-700 shadow-inner">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-800 text-blue-300 uppercase text-sm">
                <tr>
                    <th class="py-4 px-4 border-b border-gray-700">#</th>
                    <th class="py-4 px-4 border-b border-gray-700">Nama Service</th>
                    <th class="py-4 px-4 border-b border-gray-700">Harga</th>
                    <th class="py-4 px-4 border-b border-gray-700">Deskripsi</th>
                    <th class="py-4 px-4 border-b border-gray-700 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-200">
                @forelse ($services as $s)
                    <tr class="hover:bg-gray-800/60 transition">
                        <td class="py-4 px-4 border-b border-gray-700">{{ $loop->iteration }}</td>
                        <td class="py-4 px-4 border-b border-gray-700 font-semibold">{{ $s->name }}</td>
                        <td class="py-4 px-4 border-b border-gray-700">Rp {{ number_format($s->price, 0, ',', '.') }}</td>
                        <td class="py-4 px-4 border-b border-gray-700">{{ $s->description }}</td>
                        <td class="py-4 px-4 border-b border-gray-700 text-center">
                            <a href="{{ route('services.edit', $s->id) }}"
                                class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg font-bold transition">
                                Edit
                            </a>
                            <form action="{{ route('services.destroy', $s->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-bold transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 px-4 text-center text-gray-400">
                            Belum ada layanan bengkel.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
