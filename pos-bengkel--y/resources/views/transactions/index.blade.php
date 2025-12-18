@extends('layouts.app')

@section('content')
<div class="max-w-full bg-gray-900 border border-gray-700 rounded-xl p-6 shadow-xl">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-blue-400 uppercase">
            💳 Transactions
        </h2>

        <a href="{{ route('transactions.create') }}"
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-semibold">
            + New Transaction
        </a>
    </div>

    <table class="w-full text-sm text-gray-300">
        <thead class="bg-gray-800 text-gray-400 uppercase">
            <tr>
                <th class="p-3 text-left">#</th>
                <th class="p-3 text-left">Customer</th>
                <th class="p-3 text-right">Total</th>
                <th class="p-3 text-center">Date</th>
                <th class="p-3 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($transactions as $t)
            <tr class="border-b border-gray-700 hover:bg-gray-800">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3">{{ $t->customer->nama }}</td>
                <td class="p-3 text-right font-semibold text-green-400">
                    Rp {{ number_format($t->total,0,',','.') }}
                </td>
                <td class="p-3 text-center">
                    {{ $t->created_at->format('d-m-Y H:i') }}
                </td>
                <td class="p-3 text-center">
                    <a href="{{ route('transactions.show',$t) }}"
                       class="px-3 py-1 bg-gray-700 hover:bg-gray-600 rounded text-white text-xs">
                        Invoice
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="p-6 text-center text-gray-500">
                    Belum ada transaksi
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
