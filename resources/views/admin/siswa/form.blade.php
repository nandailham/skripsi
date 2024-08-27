@extends('layout.admin')

@section('content')
<div class="wire-form">
    @php
        $_multiple = $_select = [];
    @endphp
    <div wire:loading class="wire-loading text-warning">
        <span class="fa fa-spin fa-spinner "></span> Sedang memproses...
    </div>

    <div class="col-8">
        <h5 class="mt-4 mb-2">{{ isset($data) ? 'Edit Data' : 'Tambah Data' }}</h5>
        <form action="{{ isset($data) ? url('/admin/' . request()->segment(2) . '/update') : url('/admin/' . request()->segment(2) . '/store') }}"
              name="form" id="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" class="form-control" id="_i" name="_i"
                       value="{{ old('_i', isset($data) ? $data->id : '') }}" required>
                <div class="form-group col-lg-12">
                    <label>{{ ucwords(str_replace('_', ' ', 'nama')) }}</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                           value="{{ old('nama', isset($data) ? $data->nama : '') }}" required>
                </div>
            
                <div class="form-group col-lg-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Silahkan Pilih</option>
                        <option value="L" {{ old('jenis_kelamin', isset($data) && $data->jenis_kelamin == 'L' ? 'selected' : '') }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin', isset($data) && $data->jenis_kelamin == 'P' ? 'selected' : '') }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>{{ ucwords(str_replace('_', ' ', 'kelas_siswa')) }}</label>
                    <input type="text" class="form-control" id="kelas_siswa" name="kelas_siswa"
                           value="{{ old('kelas_siswa', isset($data) ? $data->kelas_siswa : 5) }}" required readonly>
                </div>
               

            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Silahkan Pilih",
            allowClear: true
        }).on('select2:open', function() {
            // Ensure the dropdown takes full width of the parent container
            $('.select2-container').css('width', '100%');
        });
    });
</script>
@endpush
