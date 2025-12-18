<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | POS Bengkel</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #0c1220;
            color: #e5e7eb;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-bg {
            background: linear-gradient(145deg, #0e1628, #09101c);
            border-right: 2px solid #124e96;
        }
        .sidebar-item {
            transition: .25s;
        }
        .sidebar-item:hover {
            background: rgba(0, 119, 255, .25);
            color: #ffffff;
        }
        .active-nav {
            background: rgba(0, 119, 255, .4);
            border-left: 4px solid #0096ff;
            color: #ffffff !important;
        }
        .content-area {
            margin-left: 16rem; /* = width sidebar 64 */
            padding: 40px;
            min-height: 100vh;
            animation: fade .4s ease;
        }
        @keyframes fade {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-[#0d1117] text-gray-200 min-h-screen">

<div class="flex">
    {{-- SIDEBAR --}}
    <aside class="w-64 h-screen fixed top-0 left-0 flex flex-col sidebar-bg">
        <div class="text-center py-6 text-2xl font-extrabold text-blue-400 tracking-wide">
            ⚙️ POS BENGKEL
        </div>

        <nav class="flex-1 px-3 space-y-1 font-medium">
            <a href="/dashboard" class="sidebar-item block px-3 py-2 rounded {{ request()->is('dashboard') ? 'active-nav' : '' }}">📊 Dashboard</a>
            <a href="/customers" class="sidebar-item block px-3 py-2 rounded {{ request()->is('customers') ? 'active-nav' : '' }}">👥 Customers</a>
            <a href="/services" class="sidebar-item block px-3 py-2 rounded {{ request()->is('services') ? 'active-nav' : '' }}">🛠 Services</a>
            <a href="/transactions" class="sidebar-item block px-3 py-2 rounded {{ request()->is('transactions') ? 'active-nav' : '' }}">💸 Transactions</a>
        </nav>

        <form action="/logout" method="POST" class="p-3">
            @csrf
            <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded shadow font-semibold">
                🚪 Logout
            </button>
        </form>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="content-area">
        @yield('content')
    </div>
</div>

</body>
</html>
