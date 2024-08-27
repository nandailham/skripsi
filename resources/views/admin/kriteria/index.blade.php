@extends('layout.admin')

@section('content')
    @php
        $urlPath = request()->path(); // Mendapatkan path URL saat ini
        $segments = explode('/', $urlPath); // Memecah path menjadi segmen berdasarkan '/'.
        $title = isset($segments[1]) ? $segments[1] : '';
    @endphp

    <div class="row">
        <div class="col-12">
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data {{ str_replace('_', ' ', Str::title($title)) }}</h3>
                    <div class="form-group">
                        @if (!empty($config) && $data->count() < $config->kriteria)
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#user"
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
                                <th>Kode Kriteria </th>
                                <th>Nama Kriteria </th>
                                <th>Bobot </th>
                                <th>Jenis Atribut </th>
                                <th style="width: 20px"><i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x = 1;
                                $columnCount = count($data->first() ? $data->first()->toArray() : []);
                            @endphp
                            @foreach ($data as $val)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{ $val->kode_kriteria }}</td>
                                    <td>{{ Str::title(str_replace('_', ' ', $val->nama_kriteria)) }}</td>
                                    <td>{{ $val->bobot_kriteria }} %</td>
                                    <td>{{ $val->jenis_atribut == 'C' ? 'COST' : 'BENEFIT' }}</td>
                                    <td style="text-align: center">
                                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-ellipsis-h " style="color: #777778"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/admin/kriteria/parameter?_i={{ $val->kode_kriteria }}" class="nav-link">Parameter</a></li>
                                            <li><a href="/admin/kriteria/edit?_i={{ $val->kode_kriteria }}" class="nav-link">Edit</a></li>
                                            <li><a href="#" class="nav-link" data-toggle="modal" data-target="#hapusModal{{ $val->kode_kriteria }}">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @if($val->parameter->isNotEmpty())
                                    <tr>
                                        <td colspan="6">
                                            <table class="table table-sm table-bordered mb-0">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <th>Nilai</th>
                                                        <th>Bobot</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($val->parameter as $param)
                                                        <tr style="text-align: center">
                                                            <td>{{ $param->nilai_v }}</td>
                                                            <td>{{ $param->bobot }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="JenisTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="JenisTitle">Tambah {{ str_replace('_', ' ', Str::title($title)) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/' . $title . '/store') }}" name="form" id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label style="color: #6c757d">Kode Kriteria</label>
                            <input type="text" maxlength="20" class="form-control" id="kode_kriteria" name="kode_kriteria" required>
                        </div>
                        <div class="form-group">
                            <label style="color: #6c757d">Nama Kriteria</label>
                            <input type="text" maxlength="30" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
                        </div>
                        <div class="form-group">
                            <label style="color: #6c757d">Bobot Kriteria (%)</label>
                            <input type="text" maxlength="20" class="form-control" id="bobot_kriteria" required name="bobot_kriteria">
                        </div>
                        <div class="form-group">
                            <label>Jenis Atribut</label>
                            <select class="form-control" name="jenis_atribut" required>
                                <option selected>--Silahkan Pilih--</option>
                                <option value="B">Benefit</option>
                                <option value="C">Cost</option>
                            </select>
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

    @foreach ($data as $item)
        <div class="modal fade" id="hapusModal{{ $item->kode_kriteria }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{ $item->kode_kriteria }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel{{ $item->kode_kriteria }}">Konfirmasi Hapus data {{ $item->kode_kriteria }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data? <br>
                        Semua yang berkaitan dengan data {{ $item->kode_kriteria }} akan ikut terhapus.
                        Termasuk Parameter dan Data Penilaian.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form action="{{ route('admin.kriteria.delete', ['id' => $item->kode_kriteria]) }}" method="POST">
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
