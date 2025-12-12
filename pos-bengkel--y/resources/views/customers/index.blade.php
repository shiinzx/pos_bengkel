@extends('layouts.app')

@section('content')
<div class="w-full bg-gray-900 border border-gray-700 rounded-xl shadow-xl p-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-blue-400 tracking-wider uppercase">
            Daftar Customer Bengkel
        </h2>

        <a href="{{ route('customers.create') }}"
            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold text-white shadow-lg shadow-blue-900/60 transition uppercase tracking-wide">
            + Tambah Customer
        </a>
    </div>

    {{-- 🔍 Search --}}
    <form method="GET" action="{{ route('customers.index') }}" class="mb-6 flex gap-3">
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari nama / nomor HP..."
            class="flex-1 max-w-md px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">

        <button class="px-6 py-3 bg-gray-700 hover:bg-gray-600 rounded-lg font-semibold text-white transition">
            Cari
        </button>
    </form>

    {{-- 🔥 Full Table --}}
    <div class="overflow-x-auto rounded-lg border border-gray-700 shadow-inner">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-800 text-blue-300 uppercase text-sm font-semibold">
                <tr>
                    <th class="py-4 px-4 border-b border-gray-700">#</th>
                    <th class="py-4 px-4 border-b border-gray-700">Nama</th>
                    <th class="py-4 px-4 border-b border-gray-700">Nomor HP</th>
                    <th class="py-4 px-4 border-b border-gray-700">Alamat</th>
                    <th class="py-4 px-4 border-b border-gray-700 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-200">
                @forelse ($customers as $c)
                    <tr class="hover:bg-gray-800/60 transition">
                        <td class="py-4 px-4 border-b border-gray-700">{{ $loop->iteration }}</td>
                        <td class="py-4 px-4 border-b border-gray-700 font-semibold">{{ $c->name }}</td>
                        <td class="py-4 px-4 border-b border-gray-700">{{ $c->phone }}</td>
                        <td class="py-4 px-4 border-b border-gray-700">{{ $c->address }}</td>
                        <td class="py-4 px-4 border-b border-gray-700 text-center flex justify-center gap-2">

                            {{-- DETAIL --}}
                            <a href="{{ route('customers.show', $c->id) }}"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold text-white transition">
                                🔍 Detail
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('customers.edit', $c->id) }}"
                                class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg font-bold transition">
                                ✏️ Edit
                            </a>

                            {{-- HAPUS --}}
                            <form action="{{ route('customers.destroy', $c->id) }}" method="POST"
                                onsubmit="return confirm('Hapus customer ini?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-bold transition">
                                    🗑 Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 px-4 text-center text-gray-400">
                            Belum ada customer.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
