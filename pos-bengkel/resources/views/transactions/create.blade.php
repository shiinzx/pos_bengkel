@extends('layouts.app')

@section('content')
<div class="max-w-full bg-gray-900 border border-gray-700 rounded-xl p-6 shadow-xl">

<h2 class="text-2xl font-bold text-blue-400 mb-4 uppercase">
    ➕ New Transaction
</h2>

<form action="{{ route('transactions.store') }}" method="POST">
@csrf

<div class="mb-4">
    <label class="block text-sm text-gray-300 mb-1">Customer</label>
    <select name="customer_id"
        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white"
        required>
        <option value="">-- pilih customer --</option>
        @foreach($customers as $c)
            <option value="{{ $c->id }}">{{ $c->nama }} ({{ $c->no_hp }})</option>
        @endforeach
    </select>
</div>

<h5 class="text-gray-300 mb-2">Items</h5>

<table class="w-full text-sm text-gray-300 mb-3" id="itemsTable">
<thead class="bg-gray-800">
<tr>
    <th class="p-2">Service</th>
    <th class="p-2">Qty</th>
    <th class="p-2">Price</th>
    <th class="p-2">Subtotal</th>
    <th></th>
</tr>
</thead>
<tbody></tbody>
</table>

<button type="button" id="addRow"
    class="px-3 py-1 bg-gray-700 hover:bg-gray-600 rounded text-white text-sm mb-4">
    + Add Item
</button>

<div class="flex justify-end mb-4">
    <div>
        <label class="block text-sm text-gray-400">Total</label>
        <input type="text" readonly name="total" id="total"
            class="bg-gray-800 border border-gray-700 rounded px-3 py-2 text-green-400 font-bold">
    </div>
</div>

<button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-bold">
    Save Transaction
</button>

</form>
</div>

@push('scripts')
<script>
const services = @json($services);

function addRow(){
    const tbody = document.querySelector('#itemsTable tbody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
    <td>
        <select name="service_id[]" class="bg-gray-800 border border-gray-700 rounded px-2 py-1 service">
            <option value="">-- service --</option>
            ${services.map(s=>`<option value="${s.id}" data-price="${s.harga}">${s.nama}</option>`).join('')}
        </select>
    </td>
    <td><input type="number" name="qty[]" value="1" min="1" class="qty bg-gray-800 border border-gray-700 rounded px-2 py-1 w-16"></td>
    <td><input type="text" name="price[]" class="price bg-gray-800 border border-gray-700 rounded px-2 py-1 w-24" readonly></td>
    <td><input type="text" name="subtotal[]" class="subtotal bg-gray-800 border border-gray-700 rounded px-2 py-1 w-24" readonly></td>
    <td><button type="button" class="remove text-red-400">x</button></td>
    `;
    tbody.appendChild(tr);

    const service = tr.querySelector('.service');
    const qty = tr.querySelector('.qty');
    const price = tr.querySelector('.price');
    const subtotal = tr.querySelector('.subtotal');

    service.onchange = ()=>{
        const p = service.selectedOptions[0]?.dataset.price || 0;
        price.value = p;
        subtotal.value = p * qty.value;
        total();
    };

    qty.oninput = ()=>{
        subtotal.value = (price.value||0) * qty.value;
        total();
    };

    tr.querySelector('.remove').onclick = ()=>{
        tr.remove();
        total();
    };
}

function total(){
    let sum = 0;
    document.querySelectorAll('.subtotal').forEach(i=>sum += parseInt(i.value||0));
    document.getElementById('total').value = sum;
}

document.getElementById('addRow').onclick = addRow;
addRow();
</script>
@endpush
@endsection
