<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class TransactionController extends Controller {
    public function index()
    {
        $transactions = Transaction::with('customer')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create(){
        $customers = Customer::all();
        $services  = Service::all();
        return view('transactions.create', compact('customers','services'));
    }

    public function store(Request $r) {

        $r->validate([
            'customer_id' => 'required|exists:customers,id',
            'total' => 'required|numeric|min:0',
            'service_id' => 'required|array',
            'qty' => 'required|array',
            'price' => 'required|array',
        ]);

        DB::transaction(function () use ($r) {

            $trx = Transaction::create([
                'customer_id' => $r->customer_id,
                'total' => $r->total,
            ]);

            foreach ($r->service_id as $i => $serviceId) {
                $trx->items()->create([
                    'service_id' => $serviceId,
                    'qty' => $r->qty[$i],
                    'price' => $r->price[$i],
                    'subtotal' => $r->subtotal[$i],
                ]);
            }
        });

        return redirect()->route('transactions.index')
            ->with('success','Transaction berhasil disimpan');
    }


    public function show(Transaction $transaction){
        $transaction->load('customer','items.service');
        return view('transactions.show',compact('transaction'));
    }
}
