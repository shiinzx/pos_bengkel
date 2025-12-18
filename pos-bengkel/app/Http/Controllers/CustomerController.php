<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::latest()->get();
        return view('customers.index', compact('customers'));
    }

    public function create() {
        return view('customers.create');
    }

    public function store(Request $r)
    {
        $r->validate([
            'nama'   => 'required|string|max:255',
            'no_hp'  => 'required|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        Customer::create([
            'nama'   => $r->nama,
            'no_hp'  => $r->no_hp,
            'alamat' => $r->alamat,
        ]);

        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil ditambahkan');
    }

    public function edit(Customer $customer) {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $r, Customer $customer) {
        $customer->update($r->all());
        return redirect()->route('customers.index')->with('success', 'Customer berhasil diperbarui');
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return back()->with('success', 'Customer berhasil dihapus');
    }

    public function show($id) {
    $customer = Customer::findOrFail($id);

    $transactions = Transaction::where('customer_id', $id)
                        ->with('service')
                        ->latest()
                        ->paginate(10);

    return view('customers.show', compact('customer', 'transactions'));
    }

}
