@extends('backend.master')

@section('content')
<div class="container">
    <h1>Daftar Makanan</h1>
    @role('Admin')

    <a href="{{ route('foods.create') }}" class="btn btn-primary mb-3">Tambah Makanan</a>
    @endrole
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($foods as $food)
            <tr>
                <td>{{ $food->name }}</td>
                <td>{{ $food->description }}</td>
                <td>Rp {{ number_format($food->price, 2, ',', '.') }}</td>
                <td>
                    @if($food->image)
                    <img src="{{ asset('storage/' . $food->image) }}" width="50">
                    @else
                    Tidak ada gambar
                    @endif
                </td>
                @role('Admin')
                <td>
                    <a href="{{ route('foods.edit', $food) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('foods.destroy', $food) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
                @endrole
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
