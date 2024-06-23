<!-- resources/views/kamars/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Daftar Kamar</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tipe Kamar</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kamars as $kamar)
        <tr>
            <td>{{ $kamar->tipe }}</td>
            <td>{{ $kamar->deskripsi }}</td>
            <td>{{ $kamar->harga }}</td>
            <td>{{ $kamar->jumlah }}</td>
            <td>
                <form action="{{ route('kamars.destroy', $kamar->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
