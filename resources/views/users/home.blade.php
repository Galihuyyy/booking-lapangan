<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Website Futsal</title>
    <style>
      html {
        scroll-behavior: smooth;
      }
      .jumbotron {
        margin-top: -120px;
      }
      .jumbotron .display-4 {
        margin-top: 150px;
      }
    </style>
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
          <li class="nav-item active">
            <a class="nav-link" href="#beranda">Beranda <span class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#list-lapangan">List Lapangan</a>
          </li>
          <li class="nav-item">
            <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#riwayatPemesanan">Riwayat Pemesanan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Contact Us
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="https://www.instagram.com/eza_oktav/" target="_blank">Instagram</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="https://api.whatsapp.com/send/?phone=6285731028944&text&type=phone_number&app_absent=0" target="_blank">WhatsApp</a></li>
            </ul>
          </li>
          <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger active ms-5" >
                      Logout
                  </button>
              </form>
          </li>
        </ul>
      </div>
    </div>

  </nav>
  
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



  <section id="beranda" class="mb-4 py-5">
    <div class="jumbotron jumbotron-fluid bg-secondary">
    <div class="container py-4">
      <div class="container text-center text-light">
      <h1 class="display-4"><b>Selamat Datang</b></h1>
      <p class="lead"> Booking lapangan futsal premium dan ekonomi dengan harga terbaik di sini. Proses cepat, fasilitas lengkap, dan jadwal fleksibel. Yuk, segera pesan dan mainkan passion futsal Anda</p>
    </div>
    </div>
  </div>
  </section>

  <section id="list-lapangan" class="py-5">
    <div class="container">
      @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif
      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      <div class="row">
        @foreach ($lapangan as $item)
          <div class="col-sm-4 d-flex mb-4">
              <div class="card w-100">
                <div class="card-body d-flex flex-column" style="min-height: 350px;">
                  <img src="{{ asset($item->foto) }}" class="img-fluid mb-3" style="height: 189px; object-fit: cover;">
                  <h5 class="card-title"><b>{{ $item->name }}</b></h5>
                  <p class="card-text">{{ $item->deskripsi }}</p>
                  <p class="card-text text-semibold">Rp. {{ $item->harga_sewa }} / Jam</p>
                  <div class="card-footer mt-auto bg-white border-0 px-0">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target={{ "#daftarBookingModal" . $item->id }}>Cek Daftar Booking</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target={{ "#tambahBookingModal" . $item->id }} >Booking Sekarang</button>
                  </div>
                </div>
              </div>
          </div>

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

        @endforeach

      </div>
    </div>
  </section>



  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>