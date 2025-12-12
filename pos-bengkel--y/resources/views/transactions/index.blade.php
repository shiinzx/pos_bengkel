@extends('layouts.app')

@section('content')
<h2 class="page-title">📌 Transactions</h2>

<table class="table table-dark table-hover classy-table">
<thead>
    <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Total</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach($transactions as $t)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $t->customer->nama }}</td>
    <td>Rp {{ number_format($t->total,0,',','.') }}</td>
    <td>{{ $t->created_at->format('d-m-Y H:i') }}</td>
    <td>
        <a href="{{ route('transactions.show',$t) }}" class="btn-invoice">Invoice</a>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
