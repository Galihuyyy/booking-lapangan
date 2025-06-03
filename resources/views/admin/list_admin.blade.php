<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List Data Admin</title>
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
  <h2 class="mb-4">List Data Admin</h2>

  <div class="mb-3 text-end">
    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahAdminModal" class="btn btn-primary">+ Tambah Admin</button>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle" id="adminTable">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Admin</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($admin as $a)
          <tr data-id="1">
            <td>1</td>
            <td class="nama">{{ $a->name }}</td>
            <td class="text-center">
              <button type="button" data-bs-toggle="modal" data-bs-target={{ "#updateAdminModal" . $a->id }} class="btn btn-sm btn-warning btn-edit">Edit</button>
              <button type="button" data-bs-toggle="modal" data-bs-target={{ "#deleteModal" . $a->id }} class="btn btn-sm btn-danger btn-delete">Hapus</button>
            </td>
          </tr>

          <div class="modal fade" id={{ "updateAdminModal" . $a->id }} tabindex="-1" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 36rem;">
              <div class="modal-content shadow">
                <div class="modal-header bg-primary text-light">
                  <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('admin.update', $a->id) }}" method="post" id="formTambahAdmin">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                      <label for="username" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Name" value="{{ $a->name }}" required>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Tutup">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id={{ "deleteModal" . $a->id }} tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                  <form action="{{ route('admin.destroy', $a->id) }}" method="post">
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



<div class="modal fade" id="tambahAdminModal" tabindex="-1" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 36rem;">
    <div class="modal-content shadow">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.store') }}" method="post" id="formTambahAdmin">
          @csrf
          <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Name" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          </div>
          <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Ulangi Password" required>
          </div>
          <div class="d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Tutup">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
