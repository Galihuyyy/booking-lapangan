<div class="modal fade" id="daftarBookingModal{{ $item->id }}" tabindex="-1" aria-labelledby="tambahBookingModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 36rem;">
              <div class="modal-content shadow">
                <div class="modal-header bg-primary text-light">
                  <h5 class="modal-title" id="tambahBookingModalLabel{{ $item->id }}">Detail Booking Lapangan</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Durasi (jam)</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($item->pemesanan->where('status_pemesanan', 'dikonfirmasi') as $booking)
                        <tr>
                          <td>{{ $booking->tanggal_booking }}</td>
                          <td>{{ $booking->jam_mulai }}</td>
                          <td>{{ $booking->jam_selesai }}</td>
                          <td>{{ $booking->durasi }}</td>
                          <td>{{ $booking->status_pemesanan }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>