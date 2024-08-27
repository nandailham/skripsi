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
                            Penghitungan Sub Kriteria, Normalisasi , & Ranking
                        </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center kelap-kelip">Penghitungan Tidak Dapat Dilakukan. Periksa Kembali
                            Konfigurasi dan Jumlah kriteria maupun Sub Kriteria</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
