@extends('layout.admin')

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
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add_modal"
                            type="button">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
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
                            @foreach ($sub_kriteria as $val)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{ $val->value }}</td>
                                    <td>{{ $val->bobot }}</td>
                                    {{-- <td style="text-align: center"> <a href="#" class="nav-link has-dropdown"
                                            data-toggle="dropdown"><i class="fa fa-ellipsis-h "
                                                style="color: #777778"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="nav-link">Sub Kriteria</a></li>

                                            <li><a href="#" class="nav-link" id="edit-data" data-toggle="modal"
                                                    data-target="" data-id="{{ $val->id }}"
                                                    data-name="{{ $val->name }}" data-email="{{ $val->email }}"
                                                    data-role="{{ $val->role }}">Edit</a></li>
                                            <li><a href="#" class="nav-link" id="edit-data" data-toggle="modal"
                                                    data-target="" data-id="{{ $val->id }}"
                                                    data-name="{{ $val->name }}" data-email="{{ $val->email }}"
                                                    data-role="{{ $val->role }}">Delete</a></li>
                                        </ul>
                                    </td> --}}
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
                    <form action="{{ url('admin/' . $title . '/sub_kriteria/store') }}" name="form" id="form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" value="{{$kriteria->kode_kriteria}}" name="kode_kriteria">
                            <label style="color: #6c757d">Kode Kriteria</label>
                            <input type="text"  class="form-control"
                             value="{{$kriteria->nama_kriteria}} ({{$kriteria->kode_kriteria}})" readonly>
                        </div>
                        <div class="form-group">
                            <label style="color: #6c757d">Value</label>
                            <input type="text" maxlength="50" class="form-control" id="value"
                                name="value">
                        </div>
                        <div class="form-group">
                            <label style="color: #6c757d">Bobot</label>
                            <input type="number" maxlength="20" class="form-control" id="bobot"
                                name="bobot">
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
@endsection
