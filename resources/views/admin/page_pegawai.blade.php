

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush
<div class="row">
    <div class="col-lg-12 col-12">

        <div class="small-box bg-secondary">
            <div class="inner" style="text-align: center">
                <h3>{{ $antrian }}</h3>
                <p>Jumlah Pendaftaran Pasien Hari ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>

                {{-- <i class="ion ion-bag"></i> --}}
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Data Jadwal Praktek Dokter </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                   
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th style="width: 20px">No</th>
                               <th>Dokter</th>
                               <th>Maksimal Pasien</th>
                               <th>Tgl dan Jam Praktek</th>
                                <th style="width: 20px"><i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x = 1;

                            @endphp
                            @foreach ($data_jadwal as $val)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{ $val->dokter->nama ?? '' }}</td>
                                    <td>{{ $val->maksimal_pasien  ?? 0 }} Pasien</td>
                                    <td>{{tgl($val->tanggal_praktek_mulai, 'd MMMM Y HH:mm') }} sampai dengan {{tgl($val->tanggal_praktek_selesai, 'd MMMM Y HH:mm') }}</td>
                                    <td style="text-align: center">
                                        <div class="nav-link has-dropdown" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h" style="color: #777778"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                           
                                            <li><a href="/admin/antrian?_p={{ $val->id }}"
                                                    class="nav-link">Kelola Antrian</a></li>
                                            <li><a href="/admin/jadwal/edit?_i={{ $val->id }}&_p={{$poli->id}}"
                                                    class="nav-link">Edit</a></li>
                                            <li><a href="#" class="nav-link delete-data" data-id="{{ $val->id }}"
                                                    data-toggle="modal" data-target="#deleteModal">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            {{-- <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div> --}}

        </div>
    </div>

</div>

@push('js')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "paging": true, // Enable paging
            "lengthChange": true, // Enable the ability to change the number of records per page
            "searching": true, // Enable searching
            "ordering": false, // Enable column ordering
            "info": false, // Enable information display about the table
            "autoWidth": false, // Disable auto-width
            "columnDefs": [{
                    "targets": [
                        1
                    ], // Adjust the index to the column you want to be searchable (index starts at 0)
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
