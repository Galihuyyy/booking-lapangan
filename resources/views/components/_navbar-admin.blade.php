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