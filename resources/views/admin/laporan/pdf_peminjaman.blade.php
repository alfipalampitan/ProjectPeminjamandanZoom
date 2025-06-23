<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman Barang</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Barang</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Instansi Yang Meminjam</th>
                <th>No Telpon</th>
                <th>Keperluan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $pinjam)
                <tr>
                    <td>{{ $pinjam->user->name }}</td>
                    <td>{{ $pinjam->barang->nama_barang }}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                    <td>{{ $pinjam->tanggal_kembali }}</td>
                    <td>{{ $pinjam->instansi->nama_instansi }}</td>
                    <td>{{ $pinjam->no_telp }}</td>
                    <td>{{ $pinjam->keperluan }}</td>
                    <td>{{ ucfirst($pinjam->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
