@php
    $privileges = [
            'C' => true,
            'U' => true,
    ];
    if(!($privileges['C'] || $privileges['U'])) abort(404);
    $info = $info ?? [];
@endphp
@extends('layout.admin')
@push('css')
    <style>
        .mt-4,
        .my-4 {
            margin-top: 1rem !important;
        }
    </style>
@endpush
@section('content')
    <h5 class="mt-4 mb-2" wire:ignore>{{ Str::ucfirst($data['title']  ?? ucwords(str_replace('_', ' ',Request::segment(2) )) ) }}</h5>
     
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
    @livewire($wire, ['data' => $data ?? null])
@endsection
