@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#0f172a] px-8 py-6">

    <h1 class="text-4xl font-bold text-blue-300 mb-6 tracking-wider">🏍️ Dashboard Bengkel</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-[#1e293b] p-6 rounded-2xl border border-blue-800 shadow-xl">
            <p class="text-gray-300 mb-1 text-sm">Total Customer</p>
            <h2 class="text-5xl font-extrabold text-blue-400">{{ $totalCustomers }}</h2>
        </div>
        <div class="bg-[#1e293b] p-6 rounded-2xl border border-blue-800 shadow-xl">
            <p class="text-gray-300 mb-1 text-sm">Total Services</p>
            <h2 class="text-5xl font-extrabold text-red-400">{{ $totalServices }}</h2>
        </div>
        <div class="bg-[#1e293b] p-6 rounded-2xl border border-blue-800 shadow-xl">
            <p class="text-gray-300 mb-1 text-sm">Total Revenue</p>
            <h2 class="text-5xl font-extrabold text-green-400">Rp {{ number_format($totalRevenue,0,',','.') }}</h2>
        </div>
    </div>

    <div class="bg-[#1e293b] p-6 rounded-2xl border border-blue-700 mb-10 shadow-xl">
        <h2 class="text-2xl font-semibold text-blue-300 mb-4">📈 Grafik Pendapatan</h2>
        <canvas id="incomeChart" class="w-full h-[350px]"></canvas>
    </div>

    <div class="bg-[#111827] p-6 rounded-2xl border border-blue-700 shadow-2xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-blue-300">📋 Riwayat Transaksi</h2>
            <div class="flex gap-2">
                <a href="#" class="px-4 py-2 text-sm rounded bg-green-600 hover:bg-green-700">Export Excel</a>
                <a href="#" class="px-4 py-2 text-sm rounded bg-red-600 hover:bg-red-700">Export PDF</a>
            </div>
        </div>

        <input type="text" placeholder="Search..." class="mb-4 w-full bg-gray-700 border border-gray-600 text-gray-200 px-3 py-2 rounded">

        <div class="overflow-x-auto">
            <table class="w-full text-gray-300">
                <thead class="bg-[#1e3a8a] text-blue-100">
                    <tr>
                        <th class="px-4 py-2">Customer</th>
                        <th class="px-4 py-2">Service</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $t)
                        <tr class="border-b border-gray-700 hover:bg-gray-800">
                            <td class="px-4 py-3">{{ $t->customer->name }}</td>
                            <td class="px-4 py-3">{{ $t->service->name }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($t->total,0,',','.') }}</td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded text-xs {{ $t->status == 'paid' ? 'bg-green-600' : 'bg-red-600' }}">
                                    {{ $t->status == 'paid' ? 'Lunas' : 'Belum Lunas' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $t->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $transactions->links() }}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('incomeChart'), {
    type: 'line',
    data: {
        labels: [1,2,3,4,5,6,7,8,9,10,11,12],
        datasets: [{
            label: "Pendapatan Bulanan",
            data: @json($monthlyRevenue),
            borderWidth: 3,
            borderColor: "rgb(59, 130, 246)",
            backgroundColor: "rgba(59, 130, 246, .3)",
            tension: 0.4
        }]
    }
});
</script>
@endsection
