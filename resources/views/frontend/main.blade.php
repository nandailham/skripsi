<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SDN 43 Pagar Alam</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('FE/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('FE/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FE/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FE/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('FE/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('FE/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-danger" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    @include('frontend.navbar')



    @yield('content')


    <!-- Footer Start -->
    @include('frontend.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-danger btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/FE/lib/wow/wow.min.js') }}    "></script>
    <script src="{{ asset('/FE/lib/easing/easing.min.js') }}  "></script>
    <script src="{{ asset('/FE/lib/waypoints/waypoints.min.js') }}    "></script>
    <script src="{{ asset('/FE/lib/counterup/counterup.min.js') }}    "></script>
    <script src="{{ asset('/FE/lib/owlcarousel/owl.carousel.min.js') }}   "></script>
    <script src="{{ asset('/FE/lib/tempusdominus/js/moment.min.js') }}    "></script>
    <script src="{{ asset('/FE/lib/tempusdominus/js/moment-timezone.min.js') }}   "></script>
    <script src="{{ asset('/FE/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }} "></script>

    <!-- Template Javascript -->
    <script src="{{ asset('FE/js/main.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            
        
            @if (session('success'))
              toastr.success('{{ session('success') }}')
            @endif
        
            @if (session('error'))
              toastr.error('{!! session('error') !!}')
            @endif
        
            $('[data-toggle="tooltip"]').tooltip();
        
        
          });
    </script>
</body>

</html>
