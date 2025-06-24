@extends('layouts.admin')

@section('content')
<div class="p-4">
    <h1 class="text-2xl font-bold mb-6">Daftar Feedback Pegawai</h1>

    <div class="overflow-x-auto bg-slate-800 text-slate-100 rounded shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-slate-700 uppercase text-slate-300">
                <tr>
                    <th class="p-3">Nama Pegawai</th>
                    <th class="p-3">Ulasan</th>
                    <th class="p-3">Rating</th>
                    <th class="p-3">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr class="border-t border-slate-700 hover:bg-slate-700">
                        <td class="p-3">{{ $feedback->user->name }}</td>
                        <td class="p-3">{{ $feedback->isi_feedback }}</td>
                        <td class="p-3">{{ $feedback->rating }} Bintang</td>
                        <td class="p-3">{{ $feedback->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
