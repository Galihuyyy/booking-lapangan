<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    <x-_navbar-user></x-_navbar-user>


    <section id="beranda" class="mb-4 py-5">
        <div class="jumbotron jumbotron-fluid bg-secondary">
            <div class="container py-4">
                <div class="container text-center text-light">
                    <h1 class="display-4"><b>Selamat Datang</b></h1>
                    <p class="lead"> Booking lapangan futsal premium dan ekonomi dengan harga terbaik di sini. Proses
                        cepat, fasilitas lengkap, dan jadwal fleksibel. Yuk, segera pesan dan mainkan passion futsal
                        Anda</p>
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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                @foreach ($lapangan as $item)
                    <div class="col-sm-4 d-flex mb-4">
                        <div class="card w-100">
                            <div class="card-body d-flex flex-column" style="min-height: 350px;">
                                <img src="{{ asset($item->foto) }}" class="img-fluid mb-3"
                                    style="height: 189px; object-fit: cover;">
                                <h5 class="card-title"><b>{{ $item->name }}</b></h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p class="card-text text-semibold">Rp. {{ $item->harga_sewa }} / Jam</p>
                                <div class="card-footer mt-auto bg-white border-0 px-0">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target={{ '#daftarBookingModal' . $item->id }}>Cek Daftar
                                        Booking</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target={{ '#tambahBookingModal' . $item->id }}>Booking Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('users.resources.modal-booking')
                    @include('users.resources.modal-daftar-booking')
                @endforeach

            </div>
        </div>
    </section>
    @include('users.resources.modal-riwayat-pemesanan')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
