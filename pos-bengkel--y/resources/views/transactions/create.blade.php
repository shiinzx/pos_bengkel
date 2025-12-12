@extends('layouts.app')
@section('title','New Transaction')
@section('content')
<div class="card">
<div class="card-body">
<form id="trxForm" action="{{ route('transactions.store') }}" method="POST">
@csrf
<div class="mb-3">
<label>Customer</label>
<select name="customer_id" class="form-select" required>
<option value="">-- Select Customer --</option>
@foreach($customers as $c)
<option value="{{ $c->id }}">{{ $c->nama }} ({{ $c->no_hp }})</option>
@endforeach
</select>
</div>


<h5>Items</h5>
<table class="table" id="itemsTable">
<thead><tr><th>Service</th><th>Qty</th><th>Price</th><th>Subtotal</th><th></th></tr></thead>
<tbody></tbody>
</table>


<button type="button" id="addRow" class="btn btn-sm btn-outline-primary mb-3">Add Item</button>


<div class="mb-3 text-end">
<label class="form-label">Total:</label>
<input type="text" readonly name="total" id="total" class="form-control" style="width:200px; display:inline-block;">
</div>


<button class="btn btn-success">Save Transaction</button>
</form>
</div>
</div>


@push('scripts')
<script>
const services = @json($services);
function format(num){ return new Intl.NumberFormat('id-ID').format(num); }

function addRow(){
  const tbody = document.querySelector('#itemsTable tbody');
  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td>
      <select name="service_id[]" class="form-select service-select" required>
        <option value="">-- select --</option>
        ${services.map(s=>`<option value="${s.id}" data-price="${s.harga}">${s.nama}</option>`).join('')}
      </select>
    </td>
    <td><input type="number" name="qty[]" class="form-control qty" value="1" min="1"></td>
    <td><input type="text" name="price[]" class="form-control price" readonly></td>
    <td><input type="text" name="subtotal[]" class="form-control subtotal" readonly></td>
    <td><button type="button" class="btn btn-sm btn-danger remove">x</button></td>
  `;
  tbody.appendChild(tr);
  attachEvents(tr);
  recalcTotal();
}

function attachEvents(tr){
  const sel = tr.querySelector('.service-select');
  const qty = tr.querySelector('.qty');
  const price = tr.querySelector('.price');
  const subtotal = tr.querySelector('.subtotal');

  sel.addEventListener('change',()=>{
    const opt = sel.selectedOptions[0];
    const p = opt?.dataset?.price ? parseInt(opt.dataset.price) : 0;
    price.value = p;
    subtotal.value = p * (parseInt(qty.value)||1);
    recalcTotal();
  });

  qty.addEventListener('input',()=>{
    subtotal.value = (parseInt(price.value)||0) * (parseInt(qty.value)||1);
    recalcTotal();
  });

  tr.querySelector('.remove').addEventListener('click',()=>{
    tr.remove();
    recalcTotal();
  });
}

function recalcTotal(){
  let sum = 0;
  document.querySelectorAll('.subtotal').forEach(i => {
    sum += parseInt(i.value || 0);
  });
  document.getElementById('total').value = sum;
}

document.getElementById('addRow').addEventListener('click', addRow);
addRow();
</script>
@endpush