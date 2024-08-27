@extends('layout.admin')

@section('content')

@push('css')
    <style>
        .mt-5, .my-5 {
  margin-top: 0rem !important;
}
    </style>
@endpush
{{-- <div class="card"> --}}
<h3>Dashboard {{Str::title(str_replace('_', ' ',Auth::user()->role))}}</h3>
{{-- </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info mt-5">
                SELAMAT DATANG <b>{{ Str::upper(Auth::user()->nama) }}</b>. SELAMAT BEKERJA
            </div>
        </div>
    </div>

    {{-- @if (Auth::user()->role == 'admin') --}}
    @include('admin.page_admin')
    {{-- @endif --}}




@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>


    {{-- <script src="{{ asset('js/dashboard_chart.js') }}"></script> --}}
    <script>
        chart_data = {};

        my_chart = new Chart('chart', {
            type: 'pie',
            data: {},
            options: {
                legend: {
                    position: "bottom"
                },
                responsive: true,
                plugins: {}
            },
        });
    </script>
@endpush
