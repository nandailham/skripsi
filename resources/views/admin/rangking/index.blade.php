@extends('layout.admin')
@push('css')
    <style>
        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .kelap-kelip {
            animation: blink 2s infinite;
            color: red;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    @php
        $urlPath = request()->path(); // Mendapatkan path URL saat ini
        $segments = explode('/', $urlPath); // Memecah path menjadi segmen berdasarkan '/'.
        $title = isset($segments[1]) ? $segments[1] : '';
    @endphp

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card  card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                             Matriks Penghitungan, Normalisasi , & Ranking
                        </h3>
                    </div>
                    <div class="card-body">

                        {{-- @if ($pembanding == true) --}}
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="penghitungan-tab" data-toggle="pill" href="#penghitungan"
                                        role="tab" aria-controls="penghitungan" aria-selected="true">Matriks
                                        Penghitungan</a>

                                    <a class="nav-link" id="normalisasi-tab" data-toggle="pill" href="#normalisasi"
                                        role="tab" aria-controls="normalisasi" aria-selected="false">Matriks
                                        Normalisasi</a>
                                    <a class="nav-link" id="vert-rangking-tab" data-toggle="pill" href="#vert-rangking"
                                        role="tab" aria-controls="vert-rangking" aria-selected="false">
                                        Ranking Nilai</a>
                                </div>
                            </div>
                            <div class="col-7 col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    <div class="tab-pane text-left fade" id="normalisasi" role="tabpanel"
                                        aria-labelledby="normalisasi-tab">
                                        <div class="row">
                                            <div class="col-12">

                                                <table id="example1" class="table table-bordered table-striped ex">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            @foreach ($kriteria as $k)
                                                                <th>{{ $k->kode_kriteria }} ({{$k->nama_kriteria}})</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($matriksNormalisasi as $siswa)
                                                            <tr>
                                                                <td>{{ $siswa['nama'] }}</td>
                                                                @foreach ($kriteria as $k)
                                                                    <td>{{ round($siswa[$k->kode_kriteria], 2) }}
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-rangking" role="tabpanel"
                                        aria-labelledby="vert-rangking-tab">
                                        <div class="row">
                                            <div class="col-12">

                                                <table id="rankingTable" class="table table-bordered table-striped ex">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Nilai Akhir</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($hasilPerhitungan as $hasil)
                                                            <tr>
                                                                <td>{{ $hasil['nama'] }}</td>
                                                                <td>{{ round($hasil['nilai'], 2) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade active show" id="penghitungan" role="tabpanel"
                                        aria-labelledby="penghitungan-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <table id="example1" class="table table-bordered table-striped ex">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            @foreach ($kriteria as $x)
                                                            <th>{{ $x->kode_kriteria }} ({{$x->nama_kriteria}})</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($matriksKeputusan as $siswa)
                                                            <tr>
                                                                <td>{{ $siswa['nama'] }}</td>
                                                                @foreach ($kriteria as $val)
                                                                    <td>{{ $siswa[$val->kode_kriteria] ?? '-' }}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @else --}}

                        {{-- @endif --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"></script>
    <script>
        $(document).ready(function() {
            $('.ex').DataTable({
                "lengthMenu": [5, 10, 15, 20, 35], // Menampilkan opsi jumlah entri per halaman
                "pageLength": 10, // Jumlah entri per halaman default
                "pagingType": "full_numbers",
                "searching": false,
                "language": {
                    "lengthMenu": "Menampilkan _MENU_ data", // Label untuk lengthMenu
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data", // Label untuk informasi entri
                    "infoEmpty": "Showing 0 to 0 of 0 entries", // Label ketika tidak ada entri
                    "infoFiltered": "(filtered from _MAX_ total entries)", // Label untuk informasi entri yang difilter
                    "paginate": {
                        "first": "",
                        "last": "",
                        "next": "",
                        "previous": ""
                    }
                },
                "ordering": false

            });
        });
    </script>
@endsection
