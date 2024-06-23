<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Sistem Pemesanan Kamar Rumah Sakit</h1>
    <p class="lead">Selamat datang di sistem pemesanan kamar rumah sakit kami.</p>
    <hr class="my-4">
    <p>Pilih salah satu opsi di bawah ini untuk melanjutkan.</p>
    <a class="btn btn-primary btn-lg my-1" href="{{ route('kamars.index') }}" role="button">Lihat Daftar Kamar</a>
    <a class="btn btn-success btn-lg" href="{{ route('pasiens.create') }}" role="button">Tambah Pasien Baru</a>
</div>
@endsection
