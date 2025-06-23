<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pimpinan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4">
        <h2 class="text-xl font-bold mb-4">Pimpinan Panel</h2>
        <nav class="space-y-2">
            <a href="/dashboard-pimpinan" class="block px-2 py-1 hover:bg-blue-100 rounded">Dashboard</a>
            <a href="{{ route('pimpinan.laporan') }}" class="block px-2 py-1 hover:bg-blue-100 rounded">Lihat Laporan</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button class="w-full text-left px-2 py-1 text-red-600 hover:bg-red-100 rounded">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Konten -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</body>
</html>
