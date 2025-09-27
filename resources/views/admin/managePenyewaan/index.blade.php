<x-admin-layout>

    <div class="container" style="margin-top:120px;">
        <div class="container" style="margin-top:120px;">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="mb-4">List Penyewaan</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
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
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($penyewaan as $p)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $p->lapangan->name }}</td>
                                <td>{{ $p->user->name }}</td>
                                <td>{{ $p->tanggal_booking }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->jam_mulai)->format('H:i') . ' - ' . \Carbon\Carbon::parse($p->jam_selesai)->format('H:i') }}
                                </td>
                                <td>{{ $p->durasi }}</td>
                                <td>{{ $p->total_bayar }}</td>
                                @php
                                    $color =
                                        $p->status_pemesanan == 'dikonfirmasi'
                                            ? 'success'
                                            : ($p->status_pemesanan == 'ditolak'
                                                ? 'danger'
                                                : 'warning');
                                @endphp

                                <td><span class="badge btn btn-{{ $color }}">{{ $p->status_pemesanan }}</span>
                                </td>
                                <td>
                                    @if ($p->status_pemesanan == 'menunggu konfirmasi')
                                        <div class="d-flex align-items-center gap-2">
                                            <form action="{{ route('penyewaan.update', $p->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit"
                                                    class="btn btn-success btn-sm">Konfirmasi</button>
                                            </form>
                                            <form action="{{ route('penyewaan.tolak', $p->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                            </form>
                                        </div>
                                    @endif
                                    @if ($p->status_pemesanan != 'menunggu konfirmasi')
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
    </div>

</x-admin-layout>
