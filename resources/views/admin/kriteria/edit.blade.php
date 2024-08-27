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
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h5 class="mt-4 mb-2">Edit Kriteria</h5>
            <form action="{{ url('admin/kriteria/update') }}" name="form" id="form" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label style="color: #6c757d">Kode Kriteria</label>
                    <input type="text" maxlength="20" class="form-control" id="kode_kriteria" name="kode_kriteria"
                        required value="{{ $data->kode_kriteria }}" readonly>
                </div>
                <div class="form-group">
                    <label style="color: #6c757d">Nama Kriteria</label>
                    <select class="form-control" name="nama_kriteria" required>
                        <option selected>--Silahkan Pilih--</option>
                        @foreach ($name_list as $item)
                            <option value="{{ $item }}" {{ $data->nama_kriteria == $item ? 'selected' : '' }}>
                                {{ Str::title(str_replace('_', ' ', $item)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label style="color: #6c757d">Bobot Kriteria (%)</label>
                    <input type="text" maxlength="20" class="form-control" id="bobot_kriteria" required
                        name="bobot_kriteria" value="{{ $data->bobot_kriteria }}">
                </div>
                <div class="form-group">
                    <label>Jenis Atribut</label>
                    <select class="form-control" name="jenis_atribut" required>
                        <option selected>--Silahkan Pilih--</option>
                        <option value="B" {{ $data->jenis_atribut == 'B' ? 'selected' : '' }}>Benefit</option>
                        <option value="C" {{ $data->jenis_atribut == 'C' ? 'selected' : '' }}>Cost</option>
                    </select>
                </div>

                <button type="submit" value="kode_kriteria" value="{{ $data->kode_kriteria }}"
                    class="btn btn-primary">Simpan</button>

            </form>
        </div>
    @endsection

    @push('js')
        <script>
            function formatCurrency(input) {
                // Menghilangkan karakter "Rp" dan titik ribuan, kemudian mengganti koma dengan titik desimal
                var value = input.value.replace('Rp ', '').replace(/\./g, '').replace(',', '.');

                // Mengatur format sebagai mata uang (Rp) dengan pemisahan ribuan
                input.value = 'Rp ' + parseFloat(value).toLocaleString('id-ID');
            }

            function calculateProfit() {
                var hargaBeliInput = document.getElementById('harga_beli');
                var hargaJualInput = document.getElementById('harga_jual');
                var keuntunganInput = document.getElementById('keuntungan');

                var hargaBeli = parseFloat(hargaBeliInput.value.replace('Rp ', '').replace(/\./g, '').replace(',', '.'));
                var hargaJual = parseFloat(hargaJualInput.value.replace('Rp ', '').replace(/\./g, '').replace(',', '.'));

                if (!isNaN(hargaBeli) && !isNaN(hargaJual)) {
                    var profit = hargaJual - hargaBeli;
                    keuntunganInput.value = 'Rp ' + profit.toLocaleString('id-ID');
                } else {
                    keuntunganInput.value = '';
                }
            }
        </script>
    @endpush
