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
            <h5 class="mt-4 mb-2">Ubah Password</h5>

            <form action="{{ Auth::user()->role == 'pasien' ? route('password_post') : route('admin.password_post') }}"  name="form" id="form" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" class="form-control" id="password_lama" name="password_lama"
                        value="{{ old('password_lama') }}">

                        @error('password_lama') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" class="form-control" id="password_baru" name="password_baru"
                        value="{{ old('password_baru') }}">
                        @error('password_baru') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password"
                        value="{{ old('konfirmasi_password') }}">
                        @error('konfirmasi_password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        </div>
        <!-- /.card-body -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection
