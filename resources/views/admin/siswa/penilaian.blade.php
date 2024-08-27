@extends('layout.admin')

@section('content')
<div class="wire-form">
    <div class="col-8">
        <h5 class="mt-4 mb-2">{{ isset($data) ? 'Edit Data' : 'Tambah Data' }}</h5>

        <table>
            <tr>
                <td>Nama</td>
                <td>: {{$siswa->nama}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{$siswa->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: {{$siswa->kelas_siswa}}</td>
            </tr>
        </table>
        <form action="{{ route('admin.siswa.penilaian.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
    
            <div class="row">
                @foreach($kriteria as $k)
                    <div class="form-group col-lg-6">
                        <label for="kriteria_{{ $k->kode_kriteria }}">{{ $k->nama_kriteria }}</label>
                        <input type="number" name="nilai[{{ $k->kode_kriteria }}]" id="kriteria_{{ $k->kode_kriteria }}" class="form-control"
                               value="{{ $penilaian->has($k->kode_kriteria) ? $penilaian[$k->kode_kriteria]->nilai : '' }}" required>
                    </div>
                @endforeach
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
