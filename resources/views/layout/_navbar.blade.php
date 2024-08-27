  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          @if (Auth::check())
              <li class="nav-item dropdown user user-menu">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{ asset('dist/img/user.png') }}" class="user-image img-circle" alt="User Image">
                      <span class="d-none d-flex float-right justify-content-around align-items-center">
                          <span
                              class="d-block mr-4">{{ Auth::user()->role == 'admin' ? 'Admin' : ucfirst(Auth::user()->nama) }}
                          </span>
                          <svg width="8" height="7" viewBox="0 0 8 7" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M4.86603 6.5C4.48113 7.16667 3.51887 7.16667 3.13397 6.5L0.535899 2C0.150999 1.33333 0.632124 0.5 1.40192 0.5L6.59808 0.500001C7.36788 0.500001 7.849 1.33333 7.4641 2L4.86603 6.5Z"
                                  fill="#333333"></path>
                          </svg>
                      </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                      <!-- User image -->
                      <li class="user-header bg-primary">
                          <img src="{{ asset('/dist/img/user.png') }}" class="img-circle" alt="User Image">
                      </li>
                      <!-- Menu Body -->

                      <!-- Menu Footer-->
                      <li class="user-footer">
                          <div style="padding-bottom: 4px">
                              <a href="{{   Auth::user()->role == 'pasien' ? url('/ubah_password') : url('/admin/password') }}" class="btn btn-default btn-flat btn-block 1single">Ubah Password</a>
                          </div>
                          <div>
                              <button type="button" onclick="window.location='{{ url('/logout') }}'"
                                  class="btn btn-default btn-flat btn-block 1single">Logout</button>
                          </div>
                      </li>
                  </ul>
              </li>
          @endif

      </ul>
  </nav>
  <!-- /.navbar -->
