<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalServices  = Service::count();
        $totalRevenue   = Transaction::sum('total');

        $transactions = Transaction::latest()->paginate(10);

        $monthlyRevenue = Transaction::selectRaw("MONTH(created_at) AS month, SUM(total) AS total")
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->pluck('total');

        return view('dashboard.index', compact(
            'totalCustomers',
            'totalServices',
            'totalRevenue',
            'transactions',
            'monthlyRevenue'
        ));
    }
}
