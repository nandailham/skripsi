@extends('layout/admin')
@section('content')
{{-- digunakan untuk global pemanggilan view livewire --}}
    @if (isset($wire) && $wire)
        @livewire($wire,['datasend' => $datasend??[] ])
    @endif
@endsection

