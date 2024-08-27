@extends('layout.admin')
@php
$title = $title ?? $datasend['model'];
$info = $info ?? [];
$menu = $menu ?? [];
$menu_active = $menu_active ?? null;

// jika tidak ada menu,maka akan di inisial hanya ada page 1
// if(!count($menu)){
//     $menu_active = $title ?: Request::segment(2);
//     $title = '';
//     $menu = [$menu_active => '#'];
// }

@endphp
{{-- @dump($title) --}}
@push('css')
    <style>
     /* #mytable-tab .nav-item .nav-link { border-color: #dee2e6 #dee2e6 #fff} */
     .header-info td:first-letter {
        text-transform: uppercase
    }

    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            {{-- title-optional digunakan ketika table trash --}}
            <h5> {{ $title }} <span id="title-optional"></span> </h5>
            
            @if ($info)
                <table class="header-info" style="width: 100%">
                    @foreach ($info as $h => $v)
                        <tr>
                            @if (is_numeric($h))
                                <td><h5> {!! $v !!}</h5> </td>
                            @else
                                <td width="{{ $info_width ?? '150' }}">{{ $h }}</td>
                                <td width="12">:</td>
                                <td>{!! $v !!}</td>
                            @endif
                        </tr>
                    @endforeach
                </table>
                <br>
            @endif
          

            @if ($menu)
                <ul class="nav nav-tabs" id="mytable-tab" role="tablist">
                    @foreach ($menu as $t => $h)
                        @php
                            $active = $t == $menu_active ? 'active' : '';
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link {{ $active }}" href="{{ $active ? 'javascript:void(0)' : $h }}"
                                role="tab">{{ ucwords($t) }}</a>
                        </li>
                    @endforeach
                </ul>

            @endif
            

            <div class="tab-content">
                @livewire('com.table-wire', ['datasend' => $datasend ?? []])
            </div>
           
        </div>
    </div>
@endsection
