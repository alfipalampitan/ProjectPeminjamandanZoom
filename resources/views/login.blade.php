<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Kominfosandi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f172a; /* slate-900 */
            background-image: url('{{ asset('img/logo-kominfo.png') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 300px;
            background-blend-mode: luminosity;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen text-slate-100">

    <div class="w-full max-w-sm bg-slate-800 p-8 rounded-xl shadow-2xl space-y-6">

        <div class="flex flex-col items-center">
            <img src="{{ asset('img/logo-kominfo.png') }}" alt="Logo Dinas" class="mb-4 size-20">
            <h2 class="text-xl font-bold mb-2 text-slate-100">Login Pegawai</h2>
            <p class="text-sm text-slate-400 text-center">Sistem Informasi Dinas Kominfo & Persandian</p>
        </div>

        @if(session('error'))
            <p class="text-red-500 text-sm mb-4 text-center bg-red-100 p-2 rounded text-red-700">{{ session('error') }}</p>
        @endif

        <form action="{{ route('login.proses') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium">Email</label>
                <input type="email" name="email" class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white" required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Password</label>
                <input type="password" name="password" class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white" required>
            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white p-2 rounded font-semibold transition">
                Masuk
            </button>

            <p class="text-center text-sm text-slate-400 mt-4">
                Belum punya akun? 
                <a href="{{ route('pegawai.register.form') }}" class="text-blue-400 underline font-medium">
                    Daftar di sini
                </a>
            </p>
        </form>

        <p class="mt-6 text-xs text-center text-slate-500">
            © {{ now()->year }} Dinas Kominfo & Persandian
        </p>

    </div>

</body>
</html>
