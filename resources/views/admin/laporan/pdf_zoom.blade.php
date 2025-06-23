<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Zoom</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Permintaan Fasilitas Zoom</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Barang</th>
                <th>Instansi</th>
                <th>Tanggal</th>
                <th>Keperluan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $zoom)
                <tr>
                    <td>{{ $zoom->user->name }}</td>
                    <td>{{ $zoom->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $zoom->instansi->nama_instansi ?? '-' }}</td>
                    <td>{{ $zoom->tanggal }}</td>
                    <td>{{ $zoom->keterangan }}</td>
                    <td>{{ ucfirst($zoom->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
