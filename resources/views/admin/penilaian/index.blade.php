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
                            Data Penilaian Siswa
                        </h3>
                    </div>
                    <div class="card-body">

                        {{-- @if ($pembanding == true) --}}
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>Penilai</th>
                                        @foreach($kriteria as $k)
                                            <th>{{ $k->nama_kriteria }}</th>
                                        @endforeach
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matriksKeputusan as $id_siswa => $data)
                                        <tr>
                                            <td>{{ $data['nama'] }}</td>
                                            <td>{{ $data['penilai'] }}</td>
                                            @foreach($kriteria as $k)
                                                <td>{{ $data[$k->kode_kriteria] }}</td>
                                            @endforeach
                                            <td><a href="/admin/siswa/penilaian?_i={{$data['id_siswa']}}">Penilaian</a></td>
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
