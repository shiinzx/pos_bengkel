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

    public function store(Request $r){
        $trx = Transaction::create([
            'customer_id'=>$r->customer_id,
            'total'=>$r->total
        ]);

        foreach($r->service_id as $i => $sid){
            TransactionItem::create([
                'transaction_id'=>$trx->id,
                'service_id'=>$sid,
                'qty'=>$r->qty[$i],
                'harga'=>$r->price[$i],
                'subtotal'=>$r->subtotal[$i]
            ]);
        }
        return redirect()->route('transactions.index');
    }

    public function show(Transaction $transaction){
        $transaction->load('customer','items.service');
        return view('transactions.show',compact('transaction'));
    }
}
