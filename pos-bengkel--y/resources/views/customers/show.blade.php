@extends('layouts.app')

@section('title', 'Detail Customer')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white p-8">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold tracking-widest text-blue-400">
            DETAIL CUSTOMER 🔧
        </h1>
        <a href="{{ route('customers.index') }}"
           class="bg-gray-700 hover:bg-gray-600 px-5 py-2 rounded-xl text-white font-semibold transition">
           ⬅ KEMBALI
        </a>
    </div>

    <!-- CUSTOMER PROFILE CARD -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
        <div class="col-span-1 bg-gray-800 shadow-lg rounded-2xl p-6 border border-gray-700">
            <h2 class="text-xl font-bold mb-4 text-blue-300">Identitas Customer 👤</h2>
            <p class="mb-2"><span class="font-semibold text-gray-400">Nama:</span> {{ $customer->name }}</p>
            <p class="mb-2"><span class="font-semibold text-gray-400">Telp:</span> {{ $customer->phone }}</p>
            <p class="mb-2"><span class="font-semibold text-gray-400">Alamat:</span> {{ $customer->address }}</p>
        </div>

        <div class="col-span-2 bg-gray-800 shadow-lg rounded-2xl p-6 border border-gray-700">
            <h2 class="text-xl font-bold mb-4 text-blue-300">Informasi Kendaraan 🚘</h2>
            <p class="mb-2"><span class="font-semibold text-gray-400">Merk:</span> {{ $customer->vehicle_brand }}</p>
            <p class="mb-2"><span class="font-semibold text-gray-400">Model:</span> {{ $customer->vehicle_model }}</p>
            <p class="mb-2"><span class="font-semibold text-gray-400">Plat:</span> {{ $customer->vehicle_plate }}</p>
            <p class="mb-2"><span class="font-semibold text-gray-400">Tahun:</span> {{ $customer->vehicle_year }}</p>
        </div>
    </div>

    <!-- SERVICE HISTORY -->
    <h2 class="text-3xl font-bold mb-6 text-blue-400 tracking-widest">Riwayat Servis 🔥</h2>

    <div class="overflow-hidden rounded-2xl shadow-xl border border-gray-800 bg-gray-900">
        <table class="w-full table-auto text-sm">
            <thead class="bg-blue-700">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Tanggal</th>
                    <th class="px-4 py-3 text-left font-semibold">Jenis Servis</th>
                    <th class="px-4 py-3 text-left font-semibold">Biaya</th>
                    <th class="px-4 py-3 text-left font-semibold">Status</th>
                    <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $item)
                <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                    <td class="px-4 py-4">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-4">{{ $item->service->name }}</td>
                    <td class="px-4 py-4 text-blue-300 font-semibold">Rp {{ number_format($item->total,0,',','.') }}</td>
                    <td class="px-4 py-4">
                        <span class="px-3 py-1 rounded-lg
                            {{ $item->status == 'selesai' ? 'bg-green-600' : 'bg-yellow-600' }}">
                            {{ strtoupper($item->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <a href="{{ route('transactions.show', $item->id) }}"
                           class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-500 transition font-semibold">
                           🔍 Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-400 py-5">
                        Belum ada riwayat servis 🚫
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $transactions->links('pagination::tailwind') }}
    </div>
</div>
@endsection
