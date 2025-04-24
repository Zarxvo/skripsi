<aside class="main-sidebar">
    <div class="sidebar">
        <div class="user-panel mt-4 pb-4 mb-1 d-flex">
            <div class="info">
                <a class="d-block">SPK Bantuan langsung tunai</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" >
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ url('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is('kriteria') ? 'active' : '' }}">
                    <a href="{{ url('kriteria') }}" class="nav-link">
                        <i class="nav-icon fas fa-sliders"></i>
                        <p>
                            Kriteria & Generate Bobot
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is('subkriteria') ? 'active' : '' }}">
                    <a href="{{ url('subkriteria') }}" class="nav-link">
                        <i class="nav-icon fas fa-indent"></i>
                        <p>
                            Sub Kriteria
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is('alternatif') ? 'active' : '' }}">
                    <a href="{{ url('alternatif') }}" class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Alternatif & Skor
                        </p>
                    </a>
                </li>
                <br>
            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <div class="info">
                <a class="d-block"> &nbsp;&nbsp;&nbsp;Hasil</a>
            </div>
        </div>
                <li class="{{ Request::is('moora') ? 'active' : '' }}">
                    <a href="{{ url('moora') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Matriks Keputusan
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is('normalisasi') ? 'active' : '' }}">
                    <a href="{{ url('normalisasi') }}" class="nav-link">
                        <i class="nav-icon fas fa-equals"></i>
                        <p>
                            Normalisasi
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is('optimasi') ? 'active' : '' }}">
                    <a href="{{ url('optimasi') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Optimasi
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is('ranking') ? 'active' : '' }}">
                    <a href="{{ url('ranking') }}" class="nav-link">
                        <i class="nav-icon fas fa-trophy"></i>
                        <p>
                            Ranking
                        </p>
                    </a>
                </li>
                <br>
                <li class="{{ Request::is('users') ? 'active' : '' }}">
                    <a href="{{ url('users') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>