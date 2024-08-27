   
<!-- Navbar End --> <!-- Topbar Start -->
    

<style>
    .navbar .navbar-nav .nav-link:hover, .navbar .navbar-nav .nav-link.active {
  color: #87191b;
}
</style>
<div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-12 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-danger me-2"></small>
                    <small>Jl. ingkar Dempo, Kel. Gunung Dempo, Kec. Pagar Alam Sel, Kota Pagar Alam, Sumatera Selatan , Kode Pos : 31581</small>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-danger"> <img style="width: 50px; height:50px" src="{{asset('img/logo.jpg')}}" alt=""> </h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link">Beranda</a>
                <a href="#tentang-kami" class="nav-item nav-link">Tentang Kami</a>
            
            </div>
            <a href="/login" class="btn btn-danger rounded-0 py-4 px-lg-5 d-none d-lg-block">{{Auth::check() ? 'Dashboard' : 'Login'}}<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
