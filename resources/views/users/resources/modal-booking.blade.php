<div class="modal fade" id={{ "tambahBookingModal" . $item->id }} tabindex="-1" aria-labelledby="tambahBookingModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 36rem;">
              <div class="modal-content shadow">
                <div class="modal-header bg-primary text-light">
                  <h5 class="modal-title" id="tambahBookingModalLabel">Booking Lapangan</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('home.store') }}" method="post" id="formBooking">
                    @csrf
        
                    <div class="mb-3">
                      <input type="hidden" name="lapangan_id" value="{{ $item->id }}" >
                    </div>
        
                    <div class="mb-3">
                      <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
                      <input type="date" class="form-control" name="tanggal_booking" required>
                    </div>
        
                    <div class="mb-3">
                      <label for="jam_mulai" class="form-label">Jam Mulai</label>
                      <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" required>
                    </div>
        
                    <div class="mb-3">
                      <label for="durasi" class="form-label">Durasi (jam)</label>
                      <input type="number" class="form-control" name="durasi" id="durasi" min="1" required>
                    </div>

                    <div class="mb-3">
                      <label for="durasi" class="form-label">Harga/jam</label>
                      <input type="number" class="form-control" name="harga_sewa" value="{{ $item->harga_sewa }}" readonly>
                    </div>
        
                    <div class="d-flex justify-content-end gap-2">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>