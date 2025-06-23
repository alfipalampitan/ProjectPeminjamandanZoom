<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengajuan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        .section-title { margin-top: 30px; font-size: 14px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman Barang</h2>

    <p class="section-title">Data Peminjaman Barang</p>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Barang</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamans as $p)
                <tr>
                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->nama_barang }}</td>
                    <td>{{ $p->tanggal_pinjam }}</td>
                    <td>{{ $p->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="section-title">Data Permintaan Zoom</p>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kegiatan</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zooms as $z)
                <tr>
                    <td>{{ $z->user->name }}</td>
                    <td>{{ $z->nama_kegiatan }}</td>
                    <td>{{ $z->tanggal }}</td>
                    <td>{{ $z->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
