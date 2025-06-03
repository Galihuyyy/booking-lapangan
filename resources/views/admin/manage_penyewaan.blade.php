<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Penyewaan Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }
        .table th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container">
            <a class="navbar-brand text-dark text-bold" href="#"><b> FUTSKETSU</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('lapangan.index') }}">List Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('admin.index') }}">List Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="{{ route('penyewaan.index') }}">Manage Penyewaan</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link active text-danger ms-5" >
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                Daftar Permintaan Penyewaan Lapangan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lapangan</th>
                                <th scope="col">Pemesan</th>
                                <th scope="col">Tanggal Sewa</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Durasi (Jam)</th>
                                <th scope="col">Total Bayar</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($penyewaan->count() == 0)
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data penyewaan.</td>
                                </tr>
                            @endif
                            @foreach ($penyewaan as $p)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $p->lapangan->name }}</td>
                                    <td>{{ $p->user->name }}</td>
                                    <td>{{ $p->tanggal_booking }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->jam_mulai)->format('H:i') . ' - ' . \Carbon\Carbon::parse($p->jam_selesai)->format('H:i') }}</td>
                                    <td>{{ $p->durasi }}</td>
                                    <td>{{ $p->total_bayar }}</td>
                                    @php
                                        $color = $p->status_pemesanan == 'dikonfirmasi' ? 'success' :
                                                ($p->status_pemesanan == 'ditolak' ? 'danger' : 'warning');
                                    @endphp

                                    <td><span class="badge btn btn-{{ $color }}">{{ $p->status_pemesanan }}</span></td>
                                    <td>
                                        @if ($p->status_pemesanan == "menunggu konfirmasi")
                                        <div class="d-flex align-items-center gap-2">
                                            <form action="{{ route('penyewaan.update', $p->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                                            </form>
                                            <form action="{{ route('penyewaan.tolak', $p->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-danger btn-sm" >Tolak</button>
                                            </form>
                                        </div>
                                        @endif
                                        @if ($p->status_pemesanan != "menunggu konfirmasi")
                                            <h4>✔️</h4>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>