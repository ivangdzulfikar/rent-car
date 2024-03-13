@extends('layouts.base')

@section('body')
<livewire:nav-bar />
@yield('content')


@isset($slot)
{{ $slot }}
@endisset
@endsection