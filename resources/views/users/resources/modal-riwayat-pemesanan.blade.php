<div class="modal fade" id="riwayatPemesanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Riwayat Pemesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          .<div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lapangan</th>
                        <th scope="col">Tanggal Booking</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Durasi (Jam)</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @if ($riwayat_pemesanan->count() == 0)
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data pesanan.</td>
                    </tr>
                  @endif
                  @php
                      $i = 1;
                  @endphp
                    @foreach ($riwayat_pemesanan as $rp)
                      <tr>
                          <th scope="row">{{ $i++ }}</th>
                          <td>{{ $rp->lapangan->name }}</td>
                          <td>{{ $rp->tanggal_booking }}</td>
                          <td>{{ $rp->jam_mulai }} - {{ $rp->jam_selesai }}</td>
                          <td>{{ $rp->durasi }}</td>
                          <td>Rp {{ $rp->total_bayar }}</td>
                            @php
                              $color = $rp->status_pemesanan == 'dikonfirmasi' ? 'success' :
                                      ($rp->status_pemesanan == 'ditolak' ? 'danger' : 'warning');
                            @endphp
                          <td><span class="btn btn-sm btn-{{ $color }}">{{ $rp->status_pemesanan }}</span></td>
                          <td>
                            @if ($rp->status_pemesanan == "menunggu konfirmasi")
                              <a href="https://wa.me/6285731028944?text={{ urlencode('Konfirmasi pembayaran dengan ID booking ' . $rp->id) }}" target="_blank" class="btn btn-primary btn-sm">Bayar</a>
                            @endif
                            @if ($rp->status_pemesanan != "dikonfirmasi")
                              <form action="{{ route('home.destroy', $rp->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Batalkan</button>
                              </form>
                            @endif
                            @if ($rp->status_pemesanan == "dikonfirmasi")
                                ✔️
                            @endif
                          </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>