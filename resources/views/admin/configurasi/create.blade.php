@extends('layout.admin')

@push('css')
    <style>
        .mt-4,
        .my-4 {
            margin-top: 1rem !important;
        }

        .alert {
            position: relative;
            padding: .5rem .5rem;
            padding-right: 0.5rem;
            margin-bottom: 0rem;
            border: 1px solid transparent;
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: transparent;
            border-radius: .25rem;
        }

        dl,
        ol,
        ul {
            margin-top: 0;
            margin-bottom: 0rem;
        }
    </style>
@endpush
@section('content')
    <div class="wire-form">
        @php
            // dikumpulkan dan ditambah # didepannya, untuk dijadikan id di js
            $_multiple = $_select = [];
        @endphp
        <div wire:loading class="wire-loading text-warning">
            <span class="fa fa-spin fa-spinner "></span> Sedang memproses...
        </div>
        <div class="col-8">
            <h5 class="mt-4 mb-2">Konfigurasi Sistem</h5>
            <form action="{{ url('admin/konfigurasi/store') }}" name="form" id="form" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Jumlah Kriteria</label>
                        <input type="number" class="form-control"  id="kriteria" name="kriteria"
                            value="{{ $config->kriteria ?? '' }}">
                    </div>
                    <div class="form-group col-lg-8">
                        <label>Jumlah Parameter di masing masing kriteria</label>
                        <input type="number" class="form-control" id="parameter"  name="parameter"
                            value="{{ $config->parameter ?? '' }}">
                    </div>
                </div>
        </div>
        <!-- /.card-body -->
        <button type="submit" name="_id" value="{{$config->id ?? ''}}" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

@push('js')
    <script></script>
@endpush
