@extends('master')
@section('konten')
<div class="container-fluid">
    <div class="alert alert-success"><b>Selamat Datang {{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</div>
</div>
@endsection