<x-admin-layout>

    <div class="d-flex align-items-center justify-content-between mb-3 text-end">
        <h2>List Data Admin</h2>
        <button type="button" data-bs-toggle="modal" data-bs-target="#tambahAdminModal" class="btn btn-primary">+
            Tambah Admin</button>
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
                @php
                    $i = 1;
                @endphp
                @foreach ($admin as $a)
                    <tr data-id="1">
                        <td>{{ $i++ }}</td>
                        <td class="nama">{{ $a->name }}</td>
                        <td class="text-center">
                            <button type="button" data-bs-toggle="modal"
                                data-bs-target={{ '#updateAdminModal' . $a->id }}
                                class="btn btn-sm btn-warning btn-edit">Edit</button>
                            <button type="button" data-bs-toggle="modal" data-bs-target={{ '#deleteModal' . $a->id }}
                                class="btn btn-sm btn-danger btn-delete">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal fade" id={{ 'updateAdminModal' . $a->id }} tabindex="-1"
                        aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 36rem;">
                            <div class="modal-content shadow">
                                <div class="modal-header bg-primary text-light">
                                    <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.update', $a->id) }}" method="post"
                                        id="formTambahAdmin">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Masukkan Name" value="{{ $a->name }}" required>
                                        </div>
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                aria-label="Tutup">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id={{ 'deleteModal' . $a->id }} tabindex="-1"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah kamu yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ route('admin.destroy', $a->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            id="confirmDeleteBtn">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="tambahAdminModal" tabindex="-1" aria-labelledby="tambahAdminModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 36rem;">
            <div class="modal-content shadow">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store') }}" method="post" id="formTambahAdmin">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Masukkan Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="confirm_password"
                                id="confirm_password" placeholder="Ulangi Password" required>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                aria-label="Tutup">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
