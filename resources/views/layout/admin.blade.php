<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- <link rel="icon" type="image/png" href="{{asset('img/logo_mkn.png')}}"> --}}
  <title> SDN 43 | {{request()->segment(2) ?? 'Dashboard'}}</title>

  @include('layout._library')
  @stack('css')
  @livewireStyles

  <style>
    #notif-approval .dropdown-item { font-size: 14px}
    .tooltip2 {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;

}

.info {
    background-color: #17a2b8;
    color: #fff;
    border-radius: .25rem;
    font-size: 75%;
    display: inline-block;
    padding: .25em .4em;
}
.bad{
    color: #fff;
        border-radius: .25rem;
        font-size: 75%;
        display: inline-block;
        padding: .25em .4em;
}
.danger {
    background-color: #dc3545;;
}
.warning {
    background-color: #ffc107;
}
.success {
    background-color: #28a745;
}

.tooltip2 .tooltiptext {
  visibility: hidden;
  width: 180px;
  background-color: black;
  color: #fff;
  text-align: left;
  border-radius: 6px;
  padding: 5px 0;
  font-size: 10px;
  padding: 10px;


  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip2:hover .tooltiptext {
  visibility: visible;
}
.date_range { background-color: #fff !important }

  </style>
</head>
<body class=" hold-transition sidebar-mini layout-fixed layout-navbar-fixed ">
<div class="wrapper">

  @include('layout._navbar')
  @include('layout._menu-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2"> </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
        <br>
      </div>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<div id="preview-img" class="modalprev modal">
  <span class="close">&times;</span>
    <img class="modalprev-content" src="" >
  <div class="caption"></div>
</div>

@livewireScripts
<script>
  $('body').loading();
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });
  $(document).ready(function () {
    $('body').loading('stop');

    @if (session('success'))
      toastr.success('{{ session('success') }}')
    @endif

    @if (session('error'))
      toastr.error('{!! session('error') !!}')
    @endif

    $('[data-toggle="tooltip"]').tooltip();


  });


</script>
@stack('js')


</body>
</html>
