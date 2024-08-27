@extends('layout.admin')

@push('css')
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
                <div class="card-header">
                    <h3 class="card-title">Data Sub Kriteria {{ $kriteria->nama_kriteria }} ({{ $kriteria->kode_kriteria }})
                    </h3>
                    <div class="form-group">
                        @if (!empty($config) && $parameter->where('kriteria_id', $kriteria->kode_kriteria)->count() < $config->parameter)
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add_modal"
                                type="button">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th style="width: 20px">No</th>
                                <th>Value </th>
                                <th>Bobot </th>
                                <th style="width: 20px"><i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x = 1;
                            @endphp
                            @foreach ($parameter as $val)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{ $val->nilai_v }}</td>
                                    <td>{{ $val->bobot }}</td>
                                    <td style="text-align: center"> <a href="#" class="nav-link has-dropdown"
                                            data-toggle="dropdown"><i class="fa fa-ellipsis-h "
                                                style="color: #777778"></i></a>
                                        <ul class="dropdown-menu">
                                            {{-- <li><a href="#" class="nav-link" id="edit-data" data-toggle="modal"
                                                    data-target="" data-id="{{ $val->id }}"
                                                    data-name="{{ $val->name }}" data-email="{{ $val->email }}"
                                                    data-role="{{ $val->role }}">Edit</a></li> --}}
                                            <li><a href="#" class="nav-link" data-toggle="modal"
                                                    data-target="#hapusModal{{ $val->id }}">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="JenisTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="JenisTitle">Tambah {{ str_replace('_', ' ', Str::title($title)) }}</h5>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/' . $title . '/parameter/store') }}" name="form" id="form"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" value="{{ $kriteria->kode_kriteria }}" name="kode_kriteria">
                            <label style="color: #6c757d">Kode Kriteria</label>
                            <input type="text" class="form-control"
                                value="{{ $kriteria->nama_kriteria }} ({{ $kriteria->kode_kriteria }})" readonly>
                        </div>

                        <div class="form-group">
                            <label>Operators</label>
                            <select class="form-control" name="operator" id="operator" required>
                                <option>--Silahkan Pilih--</option>
                                <option value="<=">(<=) Kurang dari samadengan</option>
                                <option value=">=">(>=) Lebih dari samadengan</option>
                                <option value="-">(-) Diantara 2 value</option>

                            </select>
                        </div>
                        <div id="valueForms">
                            <!-- Ini adalah tempat untuk form tambahan -->
                        </div>

                        <div class="form-group">
                            <label style="color: #6c757d">Bobot</label>
                            <input type="number" maxlength="20"   pattern="[0-9]*" class="form-control" id="bobot" name="bobot" required>
                            @error('bobot')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <input type="hidden" value="Pegawai">
                        <div class="modal-footer bg-whitesmoke" style="margin-right:-25px">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($parameter as $item)
        <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="hapusModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form action="{{ route('admin.kriteria.sub_delete', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Sembunyikan form tambahan saat halaman pertama kali dimuat
            $("#valueForms").hide();

            // Tampilkan form tambahan ketika operator berubah
            $("#operator").change(function() {
                var selectedOperator = $(this).val();
                var valueForms = $("#valueForms");

                // Kosongkan konten sebelumnya
                valueForms.empty();

                // Tampilkan elemen HTML yang telah Anda sediakan
                if (selectedOperator === "<=" || selectedOperator === ">=") {
                    var valueElement = $('<div class="form-group">\
                                                <label style="color: #6c757d">Value</label>\
                                                <input type="number"  pattern="[0-9]*" required class="form-control" id="bobot" name="value">\
                                            </div>');

                    valueForms.append(valueElement);
                }
                // Tampilkan 2 form jika operator yang dipilih adalah -
                else if (selectedOperator === "-") {
                    // Buat satu row untuk "Value 1" dan "Value 2"
                    var rowElement = $('<div class="row"></div>');

                    for (var i = 1; i <= 2; i++) {
                        var valueElement = $('<div class="col-md-6">\
                        <div class="form-group">\
                            <label style="color: #6c757d">Value ' + i + '</label>\
                            <input type="number" class="form-control"  pattern="[0-9]*" required id="bobot' + i + '" name="value' + i + '">\
                        </div>\
                    </div>');

                        rowElement.append(valueElement);
                    }

                    // Tambahkan row ke dalam form
                    valueForms.append(rowElement);
                }

                // Tampilkan form tambahan
                valueForms.show();
            });
        });
    </script>
@endpush
