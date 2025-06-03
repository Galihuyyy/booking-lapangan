<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List Lapangan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
  <div class="container d-flex justify-content-between">
    <a class="navbar-brand" href="#"><b>FUTSKETSU</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('lapangan.index') }}">List Lapangan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.index') }}">List Admin</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('penyewaan.index') }}" class="nav-link">Manage Penyewaan</a>
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

<div class="container" style="margin-top:120px;">
  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  @if($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <h2 class="mb-4">List Data Lapangan</h2>

  <div class="mb-3 text-end">
    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahLapanganModal" class="btn btn-primary">+ Tambah Lapangan</button>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle" id="adminTable">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Foto</th>
          <th scope="col">Nama</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Harga Sewa / jam</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($lapangan as $l)
            <tr data-id="1">
            <td>{{ $i++ }}</td>
            <td class="nama"><img src="{{ asset($l->foto) }}" alt="" width="120px"></td>
            <td class="nama">{{ $l->name }}</td>
            <td class="nama">{{ $l->deskripsi }}</td>
            <td class="nama">Rp. {{ $l->harga_sewa }}</td>
            <td class="text-center">
                <button type="button" data-bs-toggle="modal" data-bs-target={{ "#editLapanganModal" . $l->id }} class="btn btn-sm btn-warning btn-edit">Edit</button>
                <button type="button" data-bs-toggle="modal" data-bs-target={{ "#deleteModal" . $l->id }} class="btn btn-sm btn-danger btn-delete">Hapus</button>
            </td>
            </tr>

            <div class="modal fade" id={{ "editLapanganModal" . $l->id }} tabindex="-1" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 36rem;">
                    <div class="modal-content shadow">
                    <div class="modal-header bg-primary text-light">
                        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Lapangan</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('lapangan.update', $l->id) }}" method="post" id="formTambahAdmin" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan Foto">
                            <p class="text-warning">Kosongkan jika tidak ingin merubah gambar</p>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Name" value="{{ $l->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" value="{{ $l->deskripsi }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga_sewa" class="form-label">Harga Sewa</label>
                            <input type="number" class="form-control" name="harga_sewa" id="harga_sewa" placeholder="Masukkan Harga Sewa" value="{{ $l->harga_sewa }}" required>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id={{ "deleteModal" . $l->id }} tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('lapangan.destroy', $l->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
      </tbody>
    </table>
  </div>


</div>




<div class="modal fade" id="tambahLapanganModal" tabindex="-1" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 36rem;">
    <div class="modal-content shadow">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Lapangan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('lapangan.store') }}" method="post" id="formTambahAdmin" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan Foto" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Name" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" required>
          </div>
          <div class="mb-3">
            <label for="harga_sewa" class="form-label">Harga Sewa</label>
            <input type="number" class="form-control" name="harga_sewa" id="harga_sewa" placeholder="Masukkan Harga Sewa" required>
          </div>
          <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
