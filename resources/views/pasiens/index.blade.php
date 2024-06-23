<!-- resources/views/pasiens/index.blade.php -->
<!-- resources/views/pasiens/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Daftar Pasien</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Pasien</th>
            <th>Kamar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasiens as $pasien)
        <tr>
            <td>{{ $pasien->nama }}</td>
            <td>{{ $pasien->kamar->tipe }} - {{ $pasien->kamar->deskripsi }}</td>
            <td>
                <form action="{{ route('pasiens.keluar', $pasien->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Keluar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
