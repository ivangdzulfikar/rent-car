@extends('layouts.app')

@section('content')

<div class="container max-w-[900px] p-3 m-auto">
  <div>
    <h1 class="font-bold text-4xl mb-3">Selamat Datang, {{ auth()->user()->name }}</h1>
    <p>{{ $title }}</p>
  </div>
</div>

@endsection