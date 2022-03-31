  <!-- Navbar -->
  <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
          <div class="container">
              <a class="navbar-brand logo" href="{{ url('/') }}">
                  <img src="{{ asset('img/navlogo.png') }}" alt="logo" width="40px" height="40px">
                  <span>
                      <b>PEMERINTAH KABUPATEN CIREBON</b>
                  </span>
              </a>
              <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto nav-list">
                      <li class="nav-item px-1">
                          <a class="nav-link" href="{{ url('/') }}">BERANDA</a>
                      </li>
                      <li class="nav-item dropdown px-1">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">KECAMATAN</a>
                        <div class="dropdown-menu" arial-labelleby="navbarDropdown">
                          @foreach($kecamatans as $kecamatan)
                           <a href="{{ url('/kecamatan') }}/{{ $kecamatan->kode_kecamatan }}" class="dropdown-item">{{ $kecamatan->nama_kecamatan }}</a>
                          @endforeach
                        </div>
                      </li>
                      <li class="nav-item px-1">
                          <a class="nav-link" href="{{ url('/buku-tamu') }}">BUKU TAMU</a>
                      </li>
                      <li class="nav-item px-1">
                          <a class="nav-link" href="{{ url('/tentang-kami') }}">TENTANG KAMI</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
  </header>
  <!-- End Navbar -->