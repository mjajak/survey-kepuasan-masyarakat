@extends('layouts.app-admin')

@section('title')
Admin - Dashboard
@endsection

@section('content')
<h2>Selamat Datang Admin !!!</h2>

<div class="d-flex justify-content-center mt-5">
    <img src="{{ asset('assets/images/dashboard_new.svg') }}" style="max-width: 650px;">
</div>
@endsection