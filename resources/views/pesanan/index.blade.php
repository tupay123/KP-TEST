@extends('backend.master')

@section('content')
<div class="container">
    <h1>Daftar Pesanan</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pemesan</th>
                <th>Nama Makanan</th>
                <th>Jumlah</th>
                <th>Status Pembayaran</th>
                <th>Tanggal Pesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $pesanan)
            <tr>
                <td>{{ $pesanan->nama_pemesan }}</td>
                <td>{{ $pesanan->food->name }}</td>
                <td>{{ $pesanan->jumlah }}</td>
                <td>
                    @if($pesanan->status_pembayaran)
                        <span class="badge bg-success">Lunas</span>
                    @else
                        <span class="badge bg-warning">Belum Dibayar</span>
                    @endif
                </td>
                <td>{{ $pesanan->created_at->format('d-m-Y H:i') }}</td>
                @role('Admin')
                <td>
                    <a href="{{ route('pesanan.show', $pesanan) }}" class="btn btn-info">Detail</a>
                    <form action="{{ route('pesanan.destroy', $pesanan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</button>
                    </form>
                </td>
                @endrole
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pesanans->links() }}
</div>
@endsection
