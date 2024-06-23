@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>Tambah Pasien Baru</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('pasiens.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Pasien:</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="form-group">
                <label for="kamar_id">Pilih Kamar:</label>
                <select name="kamar_id" class="form-control" id="kamar_id" required>
                    <option value="">--Pilih Kamar--</option>
                    @foreach ($kamars as $kamar)
                        <option value="{{ $kamar->id }}">{{ $kamar->tipe }} - Rp {{ number_format($kamar->harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div id="kamar-details" class="mt-3" style="display:none;">
                <h4>Detail Kamar</h4>
                <div class="card">
                    <div class="card-body">
                        <p><strong>Tipe:</strong> <span id="kamar-tipe"></span></p>
                        <p><strong>Deskripsi:</strong> <span id="kamar-deskripsi"></span></p>
                        <p><strong>Harga:</strong> <span id="kamar-harga"></span></p>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tambahkan Pasien</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('kamar_id').addEventListener('change', function() {
        var kamarId = this.value;
        if (kamarId) {
            fetch(`/kamars/${kamarId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('kamar-details').style.display = 'block';
                    document.getElementById('kamar-tipe').innerText = data.tipe;
                    document.getElementById('kamar-deskripsi').innerText = data.deskripsi;
                    document.getElementById('kamar-harga').innerText = 'Rp ' + parseFloat(data.harga).toLocaleString('id-ID');
                })
                .catch(error => {
                    console.error('Error fetching kamar details:', error);
                });
        } else {
            document.getElementById('kamar-details').style.display = 'none';
        }
    });
</script>
@endsection
