<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Riwayat Pemesanan Lapangan</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .table th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

    <div class="container mt-6">
        <div class="card shadow-sm">
            <div class="card-header">
                Riwayat Pesanan Lapangan Anda
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lapangan</th>
                                <th scope="col">Tanggal Sewa</th>
                                <th scope="col">Waktu Sewa</th>
                                <th scope="col">Durasi (Jam)</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data pesanan.</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Lapangan Ekonomi</td>
                                    <td>2025-05-12</td>
                                    <td>19.00-22.00</td>
                                    <td>3</td>
                                    <td>Rp 200.000</td>
                                    <td><span class="badge">Selesai</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm">Detail</button>
                                        <a href="#" class="btn btn-primary btn-sm">Bayar</a>
                                        <a href="#" class="btn btn-danger btn-sm">Batalkan</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>