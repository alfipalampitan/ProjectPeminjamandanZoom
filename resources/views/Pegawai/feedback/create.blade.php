@extends('layouts.pegawai')

@section('content')
<div class="p-4 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Berikan Feedback Layanan</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <div>
            <label class="block font-medium">Ulasan</label>
            <textarea name="isi_feedback" class="w-full border p-2 rounded" rows="4" required></textarea>
        </div>

        <div>
            <label class="block font-medium">Rating</label>
            <select name="rating" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Rating --</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Bintang</option>
                @endfor
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Kirim Feedback</button>
    </form>
</div>
@endsection
