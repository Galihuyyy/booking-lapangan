<x-admin-layout>
    <div class="d-flex align-items-center justify-content-between mb-3 text-end">
        <h2>List Data Lapangan</h2>
        <button type="button" data-bs-toggle="modal" data-bs-target="#tambahLapanganModal" class="btn btn-primary">+ Tambah
            Lapangan</button>
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
                            <button type="button" data-bs-toggle="modal"
                                data-bs-target={{ '#editLapanganModal' . $l->id }}
                                class="btn btn-sm btn-warning btn-edit">Edit</button>
                            <button type="button" data-bs-toggle="modal" data-bs-target={{ '#deleteModal' . $l->id }}
                                class="btn btn-sm btn-danger btn-delete">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal fade" id={{ 'editLapanganModal' . $l->id }} tabindex="-1"
                        aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 36rem;">
                            <div class="modal-content shadow">
                                <div class="modal-header bg-primary text-light">
                                    <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Lapangan</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('lapangan.update', $l->id) }}" method="post"
                                        id="formTambahAdmin" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Foto</label>
                                            <input type="file" class="form-control" name="foto" id="foto"
                                                placeholder="Masukkan Foto">
                                            <p class="text-warning">Kosongkan jika tidak ingin merubah gambar</p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Masukkan Name" value="{{ $l->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                                placeholder="Masukkan Deskripsi" value="{{ $l->deskripsi }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_sewa" class="form-label">Harga Sewa</label>
                                            <input type="number" class="form-control" name="harga_sewa" id="harga_sewa"
                                                placeholder="Masukkan Harga Sewa" value="{{ $l->harga_sewa }}"
                                                required>
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

                    <div class="modal fade" id={{ 'deleteModal' . $l->id }} tabindex="-1"
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
                                    <form action="{{ route('lapangan.destroy', $l->id) }}" method="post">
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



    <div class="modal fade" id="tambahLapanganModal" tabindex="-1" aria-labelledby="tambahAdminModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 36rem;">
            <div class="modal-content shadow">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Lapangan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lapangan.store') }}" method="post" id="formTambahAdmin"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto"
                                placeholder="Masukkan Foto" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Masukkan Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                placeholder="Masukkan Deskripsi" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga_sewa" class="form-label">Harga Sewa</label>
                            <input type="number" class="form-control" name="harga_sewa" id="harga_sewa"
                                placeholder="Masukkan Harga Sewa" required>
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

</x-admin-layout>
