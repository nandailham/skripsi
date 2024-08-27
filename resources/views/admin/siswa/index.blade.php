@extends('layout.admin')


@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
                    <h3 class="card-title">Data {{ str_replace('_', ' ', Str::title($title)) }}</h3>
                    @if (Auth::user()->role =='admin')
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm float-right" type="button"
                            onclick="window.location='{{ url('/admin/' . $title . '/create') }}'">
                            <i class="fas fa-plus"></i> Tambah
                        </button>

                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th style="width: 20px">No</th>
                                @foreach ($componen as $columnName)
                                    <th>{{ ucwords(str_replace('_', ' ', preg_replace('/_id$/', '', $columnName))) }}</th>
                                @endforeach
                                @if (Auth::user()->role =='admin')
                                <th style="width: 20px"><i class="fas fa-cogs"></i></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x = 1;

                            @endphp
                            @foreach ($data as $val)
                                <tr>
                                    <td style="text-align: center">{{ $x++ }}</td>
                                    <td>{{ $val->nama?? '' }}</td>
                                    <td>{{ $val->jenis_kelamin }}</td>
                                    <td>{{ $val->kelas_siswa }}</td>               
                                    @if (Auth::user()->role =='admin')
                                    <td style="text-align: center">
                                        <div class="nav-link has-dropdown" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h" style="color: #777778"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                            {{-- <li><a href="/admin/{{ $title }}/penilaian?_i={{ $val->id }}"
                                                    class="nav-link">Penilaian</a></li> --}}
                                            <li><a href="/admin/{{ $title }}/edit?_i={{ $val->id }}"
                                                    class="nav-link">Edit</a></li>
                                            <li><a href="#" class="nav-link delete-data"
                                                    data-id="{{ $val->id }}" data-toggle="modal"
                                                    data-target="#deleteModal">Delete</a></li>
                                        </ul>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-size: 20px" class="modal-title" id="exampleModalCenterTitle"><i
                            class="fas fa-info-circle"></i><span></span> Konformasi Hapus!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.' . $title . '.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <p> Apakah Anda yakin ingin menghapus data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" style="width: 50px" class="btn btn-secondary">Ya</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                "paging": true, // Enable paging
                "lengthChange": true, // Enable the ability to change the number of records per page
                "searching": true, // Enable searching
                "ordering": true, // Enable column ordering
                "info": true, // Enable information display about the table
                "autoWidth": false, // Disable auto-width
                "columnDefs": [{
                        "targets": [
                        1], // Adjust the index to the column you want to be searchable (index starts at 0)
                        "searchable": true
                    },
                    {
                        "targets": '_all',
                        "searchable": false
                    }
                ]
            });
        });

        $(document).on('click', '.delete-data', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
    </script>
@endpush
