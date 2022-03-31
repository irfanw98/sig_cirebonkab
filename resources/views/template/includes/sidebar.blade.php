<div class="sidebar">
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="font-size: 18px;">
      <li class="nav-header" style="font-weight: bold;">MENU</li>
      <li class="nav-item">
        <a href="{{ url('dashboard') }}" class="nav-link {{ Request::url() == url('/dashboard') ? 'active' : ' ' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/kecamatan-menu') }}" class="nav-link {{ Request::url() == url('/kecamatan-menu') ? 'active' : ' ' }}">
          <i class="nav-icon fas fa-map"></i>
          <p>Kecamatan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/desa-menu') }}" class="nav-link {{ Request::url() == url('/desa-menu') ? 'active' : ' ' }}">
          <i class="nav-icon fas fa-map-marked-alt"></i>
          <p>Desa</p>
        </a>
      </li>
      <li class="nav-item 
          {{ 
            Request::url() == url('/statistik-menu/geografi') ||
            Request::url() == url('/statistik-menu/pemerintahan') ||
            Request::url() == url('/statistik-menu/penduduk') ||
            Request::url() == url('/statistik-menu/perdagangan') ||
            Request::url() == url('/statistik-menu/transportasi') ||
            Request::url() == url('/statistik-menu/keuangan') ||
            Request::url() == url('/statistik-menu/sosial') ||
            Request::url() == url('/statistik-menu/sosial/fasilitas-jamban') ||
            Request::url() == url('/statistik-menu/sosial/pendidikan') ||
            Request::url() == url('/statistik-menu/pertanian/padi-palawija') ||
            Request::url() == url('/statistik-menu/pertanian/sayuran-buah') ||
            Request::url() == url('/statistik-menu/pertanian/perkebunan') ||
            Request::url() == url('/statistik-menu/pertanian/ternak') ||
            Request::url() == url('/statistik-menu/pertanian/unggas') ||
            Request::url() == url('/statistik-menu/pertanian/nelayan') ||
            Request::url() == url('/statistik-menu/pertanian/kapal') ||
            Request::url() == url('/statistik-menu/pertanian/budidaya-perikanan') ||
            Request::url() == url('/statistik-menu/pertanian/garam') ||
            Request::url() == url('/statistik-menu/energi') ||
            Request::url() == url('/statistik-menu/energi/penerangan-jalan') ||
            Request::url() == url('/statistik-menu/energi/bahan-bakar-memasak') ||
            Request::url() == url('/statistik-menu/energi/sumber-air-minum') ? 'menu-is-opening menu-open' : ' ' 
          }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chart-bar"></i>
          <p>
            Statistik
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="font-size: 16px; background-color: #F2F2F2">
          <li class="{{ Request::url() == url('/statistik-menu/geografi') ? 'active' : ' ' }}">
            <a href="{{ url('/statistik-menu/geografi') }}" class="nav-link {{ Request::url() == url('/statistik-menu/geografi') ? 'active' : ' ' }}">
              <i class="fas fa-globe-asia nav-icon"></i>
              <p>Geografi</p>
            </a>
          </li>
          <li class="{{ Request::url() == url('/statistik-menu/pemerintahan') ? 'active' : ' ' }}">
            <a href="{{ url('/statistik-menu/pemerintahan') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pemerintahan') ? 'active' : ' ' }}">
              <i class="fas fa-city nav-icon"></i>
              <p>Pemerintahan</p>
            </a>
          </li>
          <li class="{{ Request::url() == url('/statistik-menu/penduduk') ? 'active' : ' ' }}">
            <a href="{{ url('/statistik-menu/penduduk') }}" class="nav-link {{ Request::url() == url('/statistik-menu/penduduk') ? 'active' : ' ' }}">
              <i class="fas fa-users nav-icon"></i>
              <p>Penduduk</p>
            </a>
          </li>
          <li class="nav-item {{ 
            Request::url() == url('/statistik-menu/sosial') ||
            Request::url() == url('/statistik-menu/sosial/fasilitas-jamban') ||
            Request::url() == url('/statistik-menu/sosial/pendidikan') ? 'menu-is-opening menu-open' : ' ' 
          }}">
            <a href="" class="nav-link {{ Request::url() == url('/statistik-menu/sosial') ? 'active' : ' ' }}" style="color: black;">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Sosial
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/sosial') ? 'active' : ' ' }}">
                <a href=" {{ url('/statistik-menu/sosial') }}" class="nav-link  {{ Request::url() == url('/statistik-menu/sosial') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sosial</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/sosial/pendidikan') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/sosial/pendidikan') }}" class="nav-link {{ Request::url() == url('/statistik-menu/sosial/pendidikan') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/sosial/fasilitas-jamban') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/sosial/fasilitas-jamban') }}" class="nav-link {{ Request::url() == url('/statistik-menu/sosial/fasilitas-jamban') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fasilitas Jamban</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item 
            {{
             Request::url() == url('/statistik-menu/pertanian/padi-palawija') ||
             Request::url() == url('/statistik-menu/pertanian/sayuran-buah') ||
             Request::url() == url('/statistik-menu/pertanian/perkebunan') ||
             Request::url() == url('/statistik-menu/pertanian/ternak') ||
             Request::url() == url('/statistik-menu/pertanian/unggas') ||
             Request::url() == url('/statistik-menu/pertanian/nelayan') ||
             Request::url() == url('/statistik-menu/pertanian/kapal') ||
             Request::url() == url('/statistik-menu/pertanian/budidaya-perikanan') ||
             Request::url() == url('/statistik-menu/pertanian/garam') ? 'menu-is-opening menu-open' : ' ' 
            }}">
            <a href="#" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-seedling"></i>
              <p>
                Pertanian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/padi-palawija') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/padi-palawija') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/padi-palawija') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Padi & Palawija</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/sayuran-buah') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/sayuran-buah') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/sayuran-buah') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sayuran & Buah</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/perkebunan') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/perkebunan') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/perkebunan') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perkebunan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/ternak') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/ternak') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/ternak') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ternak</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/unggas') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/unggas') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/unggas') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unggas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/nelayan') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/nelayan') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/nelayan') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nelayan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/kapal') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/kapal') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/kapal') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kapal</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/budidaya-perikanan') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/budidaya-perikanan') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/budidaya-perikanan') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budidaya Perikanan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/pertanian/garam') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/pertanian/garam') }}" class="nav-link {{ Request::url() == url('/statistik-menu/pertanian/garam') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Garam</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ 
            Request::url() == url('/statistik-menu/energi') || 
            Request::url() == url('/statistik-menu/energi/penerangan-jalan') ||
            Request::url() == url('/statistik-menu/energi/bahan-bakar-memasak') ||
            Request::url() == url('/statistik-menu/energi/sumber-air-minum') ? 'menu-is-opening menu-open' : ' ' 
          }}">
            <a href="{{ url('/statistik-menu/energi') }}" class="nav-link {{ Request::url() == url('/statistik-menu/energi') ? 'active' : ' ' }}" style="color: black;">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Energi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/energi') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/energi') }}" class="nav-link  {{ Request::url() == url('/statistik-menu/energi') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Energi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/energi/penerangan-jalan') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/energi/penerangan-jalan') }}" class="nav-link {{ Request::url() == url('/statistik-menu/energi/penerangan-jalan') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerangan Jalan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/energi/bahan-bakar-memasak') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/energi/bahan-bakar-memasak') }}" class="nav-link {{ Request::url() == url('/statistik-menu/energi/bahan-bakar-memasak') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahan Bakar Memasak</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="font-size: 14px;">
              <li class="{{ Request::url() == url('/statistik-menu/energi/sumber-air-minum') ? 'active' : ' ' }}">
                <a href="{{ url('/statistik-menu/energi/sumber-air-minum') }}" class="nav-link {{ Request::url() == url('/statistik-menu/energi/sumber-air-minum') ? 'active' : ' ' }} pl-4" width="50%">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sumber Air Minum</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="{{ Request::url() == url('/statistik-menu/perdagangan') ? 'active' : ' ' }}">
            <a href="{{ url('/statistik-menu/perdagangan') }}" class="nav-link {{ Request::url() == url('/statistik-menu/perdagangan') ? 'active' : ' ' }}">
              <i class="fas fa-store nav-icon"></i>
              <p>Perdagangan</p>
            </a>
          </li>
          <li class="{{ Request::url() == url('/statistik-menu/transportasi') ? 'active' : ' ' }}">
            <a href="{{ url('/statistik-menu/transportasi') }}" class="nav-link {{ Request::url() == url('/statistik-menu/transportasi') ? 'active' : ' ' }}">
              <i class="fas fa-car nav-icon"></i>
              <p>Transportasi</p>
            </a>
          </li>
          <li class="{{ Request::url() == url('/statistik-menu/keuangan') ? 'active' : ' ' }}">
            <a href="{{ url('/statistik-menu/keuangan') }}" class="nav-link {{ Request::url() == url('/statistik-menu/keuangan') ? 'active' : ' ' }}">
              <i class="fas fa-dollar-sign nav-icon"></i>
              <p>Keuangan</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item {{ Request::url() == url('/wisata-menu') ? 'active' : ' ' }}">
        <a href="{{ url('/wisata-menu') }}" class="nav-link {{ Request::url() == url('/wisata-menu') ? 'active' : ' ' }}">
          <i class="nav-icon fas fa-map-marker-alt"></i>
          <p>Wisata</p>
        </a>
      </li>
      <li class="nav-item {{ Request::url() == url('/bukutamu-menu') ? 'active' : ' ' }}">
        <a href="{{ url('/bukutamu-menu') }}" class="nav-link {{ Request::url() == url('/bukutamu-menu') ? 'active' : ' ' }}">
          <i class="nav-icon fas fa-book"></i>
          <p>Buku Tamu</p>
        </a>
      </li>
      <li class="nav-item {{ Request::url() == url('/tentangkami-menu') ? 'active' : ' ' }}">
        <a href="{{ url('/tentangkami-menu') }}" class="nav-link {{ Request::url() == url('/tentangkami-menu') ? 'active' : ' ' }}">
          <i class="nav-icon fas fa-id-card"></i>
          <p>Tentang Kami</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>