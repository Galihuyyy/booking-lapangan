<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
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
                    <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#riwayatPemesanan">Riwayat
                        Pemesanan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Contact Us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="https://www.instagram.com/eza_oktav/"
                                target="_blank">Instagram</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item"
                                href="https://api.whatsapp.com/send/?phone=6285731028944&text&type=phone_number&app_absent=0"
                                target="_blank">WhatsApp</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger active ms-5">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</nav>
