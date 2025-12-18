@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 border border-gray-700 rounded-xl p-6 shadow-xl">

<h2 class="text-2xl font-bold text-blue-400 mb-4 uppercase">
    🧾 Invoice
</h2>

<div class="mb-4 text-gray-300">
    <p><strong>Customer:</strong> {{ $transaction->customer->nama }}</p>
    <p><strong>Date:</strong> {{ $transaction->created_at->format('d-m-Y H:i') }}</p>
</div>

<table class="w-full text-sm text-gray-300 mb-4">
<thead class="bg-gray-800">
<tr>
    <th class="p-2 text-left">Service</th>
    <th class="p-2 text-center">Qty</th>
    <th class="p-2 text-right">Price</th>
    <th class="p-2 text-right">Subtotal</th>
</tr>
</thead>
<tbody>
@foreach($transaction->items as $item)
<tr class="border-b border-gray-700">
    <td class="p-2">{{ $item->service->nama }}</td>
    <td class="p-2 text-center">{{ $item->qty }}</td>
    <td class="p-2 text-right">Rp {{ number_format($item->price,0,',','.') }}</td>
    <td class="p-2 text-right text-green-400">
        Rp {{ number_format($item->subtotal,0,',','.') }}
    </td>
</tr>
@endforeach
</tbody>
</table>

<div class="text-right text-xl font-bold text-green-400 mb-4">
    Total: Rp {{ number_format($transaction->total,0,',','.') }}
</div>

<a href="{{ route('transactions.index') }}"
   class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded text-white">
   ❮ Back
</a>

</div>
@endsection
