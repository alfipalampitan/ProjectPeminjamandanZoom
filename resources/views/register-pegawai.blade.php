<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - Sistem Kominfosandi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f172a;
            background-image: url('{{ asset('img/logo-besar.png') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 300px;
            background-blend-mode: luminosity;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center text-slate-100">

    <div class="w-full max-w-lg bg-slate-800 rounded-xl shadow-2xl p-8 space-y-6">
        
        <div class="flex flex-col items-center">
            <img src="{{ asset('img/logo-kominfo.png') }}" alt="Logo Dinas" class="mb-4 size-20">
            <h1 class="text-2xl font-bold text-center text-slate-100 mb-2">Registrasi Akun</h1>
            <p class="text-sm text-slate-400 text-center mb-4">Sistem Informasi Dinas Kominfo & Persandian</p>
        </div>

        <div class="h-1 bg-blue-600 rounded-full"></div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pegawai.register.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white focus:bg-slate-700 focus:border-blue-500 hover:bg-slate-700" required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Email</label>
                <input type="email" name="email" class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white focus:bg-slate-700 focus:border-blue-500 hover:bg-slate-700" required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">No Telepon</label>
                <input type="text" name="no_telp" class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white focus:bg-slate-700 focus:border-blue-500 hover:bg-slate-700" required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Instansi</label>
                <select name="instansi_id" class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white focus:bg-slate-700 hover:bg-slate-700" required>
                    <option value="">-- Pilih Instansi --</option>
                    @foreach ($instansis as $instansi)
                        <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white pr-10 focus:bg-slate-700 focus:border-blue-500 hover:bg-slate-700" required>
                    <span onclick="togglePassword('password')" class="absolute top-2 right-3 text-gray-400 cursor-pointer">👁️</span>
                </div>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Konfirmasi Password</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white pr-10 focus:bg-slate-700 focus:border-blue-500 hover:bg-slate-700" required>
                    <span onclick="togglePassword('password_confirmation')" class="absolute top-2 right-3 text-gray-400 cursor-pointer">👁️</span>
                </div>
            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white p-2 rounded font-semibold transition">
                Daftar Sekarang
            </button>

            <p class="text-sm text-center text-slate-400 mt-4">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-400 underline">Masuk di sini</a>
            </p>
        </form>

        <p class="mt-6 text-xs text-center text-slate-500">
            © {{ now()->year }} Dinas Kominfo & Persandian
        </p>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>

</body>
</html>
