<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="brand-image  elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> SD N 43 Pagar Alam</span>
    </a>

    @if (Auth::user()->role == 'admin')
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child" data-widget="treeview"
                    role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="/admin" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @foreach ([
        'siswa' => [],
        'penilaian' => [],
        'rangking' => [],
        'laporan' => [],

        'kriteria' => [],
        'konfigurasi' => [],
    ] as $key => $val)
                        <li class="nav-item">
                            <a href="/admin/{{ $key }}" class="nav-link">
                                <i class="nav-icon {{ isset($val['icon']) ? $val['icon'] : 'far fa-circle' }}"></i>
                                <p>{{ $val['title'] ?? str_replace('_', ' ', Str::title($key)) }}</p>
                            </a>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <br>
            <!-- /.sidebar-menu -->
        </div>
    @endif
    @if (Auth::user()->role == 'guru')
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child" data-widget="treeview"
                    role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="/admin" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @foreach ([
        'siswa' => [],
        'penilaian' => [],
        'rangking' => [],
    ] as $key => $val)
                        <li class="nav-item">
                            <a href="/admin/{{ $key }}" class="nav-link">
                                <i class="nav-icon {{ isset($val['icon']) ? $val['icon'] : 'far fa-circle' }}"></i>
                                <p>{{ isset($val['title']) ? $val['title'] : str_replace('_', ' ', Str::title($key)) }}
                                </p>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <br>
            <!-- /.sidebar-menu -->
        </div>
    @endif
   
    @if (Auth::user()->role == 'kepala_sekolah')
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child" data-widget="treeview"
                    role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="/admin" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @foreach ([
        'laporan' => [],
        'rangking' => [],
    ] as $key => $val)
                        <li class="nav-item">
                            <a href="/admin/{{ $key }}" class="nav-link">
                                <i class="nav-icon {{ isset($val['icon']) ? $val['icon'] : 'far fa-circle' }}"></i>
                                <p>{{ isset($val['title']) ? $val['title'] : str_replace('_', ' ', Str::title($key)) }}
                                </p>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <br>
            <!-- /.sidebar-menu -->
        </div>
    @endif
   
</aside>
