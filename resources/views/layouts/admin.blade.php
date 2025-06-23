<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-slate-900 min-h-screen text-slate-100 overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 shadow-xl p-4 flex flex-col justify-between">

        <div>
            <div class="flex items-center mb-8">
                <img src="{{ asset('img/logo-kominfo.png') }}" alt="Logo" class="w-10 h-10 mr-2">
                <h2 class="text-lg font-bold">Admin Panel</h2>
            </div>

            <nav class="space-y-2">
                <a href="/dashboard-admin" class="block px-3 py-2 rounded {{ Request::is('dashboard-admin') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-700' }}">
                    Dashboard
                </a>
                <a href="/admin/peminjaman" class="block px-3 py-2 rounded {{ Request::is('admin/peminjaman*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-700' }}">
                    Verifikasi Peminjaman
                </a>
                <a href="/admin/zoom" class="block px-3 py-2 rounded {{ Request::is('admin/zoom*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-700' }}">
                    Verifikasi Zoom
                </a>
                <a href="/admin/barang" class="block px-3 py-2 rounded {{ Request::is('admin/barang*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-700' }}">
                    Data Barang
                </a>
                <a href="/admin/users" class="block px-3 py-2 rounded {{ Request::is('admin/users*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-700' }}">
                    Kelola User
                </a>
                <a href="{{ route('admin.laporan.form') }}" class="block px-3 py-2 rounded {{ Request::is('admin/laporan*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-700' }}">
                    Cetak Laporan
                </a>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <button class="w-full text-left px-3 py-2 text-red-500 hover:bg-red-500 hover:text-white rounded">
                Logout
            </button>
        </form>

    </aside>

    <!-- Konten -->
    <main class="flex-1 p-6 overflow-auto h-screen">
        @yield('content')
    </main>

</body>
</html>
