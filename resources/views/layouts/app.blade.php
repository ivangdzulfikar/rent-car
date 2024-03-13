@extends('layouts.base')

@section('body')
@auth

<livewire:nav-bar />

<livewire:side-bar />


@endauth

@yield('content')


@isset($slot)
{{ $slot }}
@endisset
@endsection