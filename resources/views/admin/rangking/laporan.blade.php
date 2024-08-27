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
                           Laporan Siswa Paling Berprestasi
                        </h3>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm float-right" type="button" data-toggle="modal" data-target="#printModal">
                                Cetak
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-12 col-sm-12">
                                <table id="rankingTable" class="table table-bordered table-striped ex">
                                    <thead>
                                        <tr>
                                            <th style="width:10%">Rangking</th>
                                            <th>Nama</th>
                                            <th>Nilai Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x=1;
                                        @endphp
                                        @foreach ($hasilPerhitungan as $hasil)
                                            <tr>
                                                <td style="text-align: center">{{$x++ }}</td>
                                                <td>{{ $hasil['nama'] }}</td>
                                                <td>{{ round($hasil['nilai'], 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
    
                                </div>
                            </div>
                        </div>
                        {{-- @else --}}

                        {{-- @endif --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="printModalLabel">Cetak Siswa Berprestasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="printForm">
                            <div class="form-group">
                                <label for="numberOfStudents">Pilih Jumlah Siswa</label>
                                <select class="form-control" id="numberOfStudents">
                                    <option value="5">5 Siswa</option>
                                    <option value="10">10 Siswa</option>
                                    <option value="20">20 Siswa</option>
                                    <option value="all">Semua Siswa</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="printButton">Cetak</button>
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
            $('#printButton').on('click', function() {
            let numberOfStudents = $('#numberOfStudents').val();
            // Redirect to the print route with the selected value
            window.location.href = `/admin/laporan/cetak/${numberOfStudents}`;
        });

        
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
